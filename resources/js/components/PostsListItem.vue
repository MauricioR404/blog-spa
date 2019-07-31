<template>
<div class="single-blog-post">
  <div class="post-thumb relative">
    <div class="overlay overlay-bg"></div><!-- .overlay -->
    <img v-for="image in post.photos" :src="'../img/' + image.url" :key="image.id">
  </div><!-- .post-thumb  -->

  <div class="post-details">
    <ul class="tags">
      <li v-for="tag in post.tags" :key="tag.id">
        <router-link :to="{
                            name: 'tags_posts', 
                            params: {tag: tag.url}}" v-text="tag.name" />
      </li>
    </ul>

    <router-link :to="{name: 'posts_show', params: {url: post.url}}">
      <h1 v-text="post.title"></h1>
    </router-link>

    <p v-text="post.excerpt"></p>

    <div class="user-details d-flex align-items-center">
      <div class="user-img">
        <img class="img-fluid" :src="'../img/user.jpg'">
      </div><!-- .user-img -->

      <div class="details">
          <h4 v-text="post.owner.name"></h4>
        <p>{{ post.created_date }}</p>
      </div><!-- .details -->
    </div><!-- .user-details -->
  </div><!-- ."post-details -->
</div><!-- .single-blog-post -->
</template>

<script>
export default {
  props: ['post']
}
</script>
