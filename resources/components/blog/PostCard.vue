<script setup>
const props = defineProps({
    post: Object
});

</script>

<template>
    <div class="item mb-5">
        <div class="media">
            <!-- <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-1.jpg"
                alt="image"> -->
            <div class="media-body">
                <h3 class="title mb-1">
                    <router-link :to="{ path: `/post/${post.id}` }" >
                        <!-- <a href="#">{{ post.title }}</a> -->
                        {{ post.title }}
                    </router-link>
                    
                </h3>
                <div class="meta mb-1">
                    <span class="date">Published 2 days ago</span>
                    <span class="time">5 min read</span>
                    <span class="comment">
                        <a href="#">8 comments</a>
                    </span>
                </div>
                <div class="intro">
                    {{ post.annotation }}
                </div>
                <router-link :to="{ path: `/post/${post.id}` }" class="more-link">
                    Read more &rarr;
                </router-link>
            </div><!--//media-body-->
        </div><!--//media-->
    </div><!--//item-->
    <hr>
</template>

<style></style>