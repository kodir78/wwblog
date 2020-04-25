<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Post extends Model
{
    // agar published_at diterjemahkan sebagai object Carbon maka buat
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $dates = ['published_at'];
    
    use softDeletes;
    // Jika semua field dimasukan
    //protected $guardian = [];
    protected $fillable = [
        'author_id','title', 'slug', 'category_id','excerpt',
        'body','image', 'published_at', 
    ];
    
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        
        if (!is_null($this->image)) {
            $directory = config('cms.image.directory');
            $imagePath = public_path() ."/{$directory}" . $this->image;
            // $imagePath = public_path() ."/uploads/images/posts/" . $this->image;
            // if(file_exists($imagePath)) $imageUrl = asset("public/uploads/images/posts/" . $this->image);
            if(file_exists($imagePath)) $imageUrl = asset("/{$directory}" . $this->image);
        }
        
        return $imageUrl;
    }
    
    public function getImageThumbUrlAttribute($value)
    {
        $imageThumbUrl = "";
        
        if (!is_null($this->image)) {
            $directory = config('cms.image.directory');
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() ."/{$directory}" . $thumbnail;
            if(file_exists($imagePath)) $imageThumbUrl = asset("/$directory" . $thumbnail);
        }
        
        return $imageThumbUrl;
    }
    
    public function getDateAttribute($value)
    {
        //Pastikan kolom published_at tidak Null
        return is_null($this->published_at) ? '' : $this->published_at->diffforHumans();
    }
    // atribut Link Tags
    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach($this->tags as $tag) {
            $anchors[] = '<a href="' . route('tag', $tag->slug) . '">' . $tag->title . '</a>';
        }
        return implode(", ", $anchors);
    }
    
    // fungsi scope untuk mengurutkan tulisan terabaru
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    
    // fungsi scope untuk mengurutkan tulisan terabaru
    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }
    
    // fungsi scope untuk manampilkan yang status publish
    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::Now());
    }
    
    // fungsi scope untuk manampilkan yang status draft jika field published_at > tgl sekarang
    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">", Carbon::Now());
    }
    
    // fungsi scope untuk manampilkan yang status draft jika field published_at kosong
    public function scopeDraft($query)
    {
        return $query->where("published_at");
    }
    
    public static function archives()
    {
        if (env('DB_CONNECTION') == 'pgsql')
        {
            return static::selectRaw('count(id) as post_count, extract(year from published_at) as year, extract(month from published_at) as month')
            ->published()
            ->groupBy('year', 'month')
            ->orderByRaw('min(published_at) desc')
            ->get();
        }
        else
        {
            return static::selectRaw('count(id) as post_count, year(published_at) year, month(published_at) month')
            ->published()
            ->groupBy('year', 'month')
            ->orderByRaw('min(published_at) desc')
            ->get();
        }
    }
    
    // fungsi scope untuk manampilkan yang pencarian disesuaikan dengan jenis DATABASE
    // apakah DB pgsql atau Mysql
    public function scopeFilter($query, $filter)
    {
        if (isset($filter['month']) && $month = $filter['month'])
        {
            if (env('DB_CONNECTION') == 'pgsql') {
                $query->whereRaw('extract(month from published_at) = ?', [$month]);
            }
            else {
                $query->whereRaw('month(published_at) = ?', [$month]);
            }
        }
        
        if (isset($filter['year']) && $year = $filter['year'])
        {
            if (env('DB_CONNECTION') == 'pgsql') {
                $query->whereRaw('extract(year from published_at) = ?', [$year]);
            }
            else {
                $query->whereRaw('year(published_at) = ?', [$year]);
            }
        }
        
        
        // check if any term entered
        if (isset($filter['term']) && $term = strtolower($filter['term']))
        {
            $query->where(function($q) use ($term){
                //tambah pencarian dengan relasi ke author and category
                $q->whereHas('author', function($qr) use ($term) {
                    $qr->where('name', 'LIKE', "%{$term}%");
                });
                $q->orWhereHas('category', function($qr) use ($term) {
                    $qr->where('title', 'LIKE', "%{$term}%");
                });
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('body', 'LIKE', "%{$term}%");
            });
        }
    }
    
    // fungsi input publishe_at jika dikosongkan berisi NULL
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: NULL;
    }

    // fungsi menampilkan tags
    public function getTagsListAttribute()
    {
        return $this->tags->pluck('title');
    }
    // Relasi users ke posts
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relasi Category ke Post
    public function category()
    {
        # code...
        return $this->belongsTo(Category::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function commentsNumber($label = 'Comment')
    {
        $commentsNumber = ($tmp = $this->comments) ? $tmp->count() : 0;
        
        return $commentsNumber . " " . Str::plural($label, $commentsNumber);
    }
    
    public function createComment(array $data)
    {
        $this->comments()->create($data);
    }
    
    // SEO 
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes) $format = $format . " H:i:s";
        return $this->created_at->format($format);
    }
    
    public function publicationLabel()
    {
        if ( ! $this->published_at) {
            return '<span class="badge bg-warning">Draft</span>';
        }
        elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="badge bg-info">Schedule</span>';
        }
        else {
            return '<span class="badge bg-success">Published</span>';
        }
    }
    
    public function createTags($tagString)
    {
        $tags = explode(",", $tagString);
        $tagIds = [];
        foreach ($tags as $tag)
        {
            $newTag = Tag::firstOrCreate(
                ['slug' => Str::slug($tag)],
                ['title' => ucwords(trim($tag))]
            );

            $tagIds[] = $newTag->id;
        }
        $this->tags()->sync($tagIds);
    }

}
