<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

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
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'published' => $this->published,
            'title' => $this->title,
            'annotation' => $this->annotation,
            'body' => html_entity_decode($this->body),
            'image' => $this->image,
            'userId' => $this->user_id,
            'created_at' => $this->created_at,
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
}
