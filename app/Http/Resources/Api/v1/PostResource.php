<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $created_at = \Carbon\Carbon::parse($this->created_at)->format('d-m-Y');
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'published' => $this->published,
            'title' => $this->title,
            'annotation' => $this->annotation,
            'body' => html_entity_decode($this->body),
            'image' => $this->getPostPathAttribute($this->image),
            'userId' => $this->user_id,
            'created_at' => $created_at,
            'updated_at' => $this->updated_at,
            'published_at' => $this->published_at,
            'custom_code' => $this->id . '_' . $this->title . '_' . $this->user_id,
        ];

        // id	2
        // published	1
        // title	"Guzzle"
        // annotation	"Guzzle is library for sending cURL-requests"
        // body	`<blockquote>\r\n<pre style="text-align: justify;"><span style="background-color: rgb(255, 255, 255);"><span class="nv"><br></span><span class="nv">$client</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">GuzzleHttp\\Client</span><span class="p">();</span></span>\r\n<span class="nv">$res</span> <span class="o">=</span> <span class="nv">$client</span><span class="o">-&gt;</span><span class="na">request</span><span class="p">(</span><span class="s1">'GET'</span><span class="p">,</span> <span class="s1">'https://api.github.com/user'</span><span class="p">,</span> <span class="p">[</span>\r\n    <span class="s1">'auth'</span> <span class="o">=&gt;</span> <span class="p">[</span><span class="s1">'user'</span><span class="p">,</span> <span class="s1">'pass'</span><span class="p">]</span>\r\n<span class="p">]);</span>\r\n<span class="k">echo</span> <span class="nv">$res</span><span class="o">-&gt;</span><span class="na">getStatusCode</span><span class="p">();</span>\r\n<span class="c1">// "200"</span>\r\n<span class="k">echo</span> <span class="nv">$res</span><span class="o">-&gt;</span><span class="na">getHeader</span><span class="p">(</span><span class="s1">'content-type'</span><span class="p">)[</span><span class="mi">0</span><span class="p">];</span>\r\n<span class="c1">// 'application/json; charset=utf8'</span>\r\n<span class="k">echo</span> <span class="nv">$res</span><span class="o">-&gt;</span><span class="na">getBody</span><span class="p">();</span>\r\n<span class="c1">// {"type":"User"...'</span>\r\n\r\n<span class="c1">// Send an asynchronous request.</span>\r\n<span class="nv">$request</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">\\GuzzleHttp\\Psr7\\Request</span><span class="p">(</span><span class="s1">'GET'</span><span class="p">,</span> <span class="s1">'http://httpbin.org'</span><span class="p">);</span>\r\n<span class="nv">$promise</span> <span class="o">=</span> <span class="nv">$client</span><span class="o">-&gt;</span><span class="na">sendAsync</span><span class="p">(</span><span class="nv">$request</span><span class="p">)</span><span class="o">-&gt;</span><span class="na">then</span><span class="p">(</span><span class="k">function</span> <span class="p">(</span><span class="nv">$response</span><span class="p">)</span> <span class="p">{</span>\r\n    <span class="k">echo</span> <span class="s1">'I completed! '</span> <span class="o">.</span> <span class="nv">$response</span><span class="o">-&gt;</span><span class="na">getBody</span><span class="p">();</span>\r\n<span class="p">});</span>\r\n<span class="nv">$promise</span><span class="o">-&gt;</span><span class="na">wait</span><span class="p">();</span></pre>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;https://docs.guzzlephp.org/en/stable/</p>`
        // image	"no_image.jpg"
        // user_id	2
        // created_at	"2023-10-07T00:00:00.000000Z"
        // updated_at	"2023-10-07T20:20:35.000000Z"
        // published_at	null
    }

    public function getPostPathAttribute($post_image)
    {
        if(file_exists(storage_path("app\public\\" . $post_image))){
            $url = asset(Storage::url($post_image ?: 'images/about-me.jpg'));

            //Remove domain from $url, because gives http://127.0.0.1/ not http://127.0.0.1:8000/ 
            //without port :8000
            $path = parse_url($url, PHP_URL_PATH);
        }else{
            $path = '/storage/images/about-me.jpg';
        }

        return $path;
        // return asset(Storage::url('images/about-me.jpg'));
    }
}
