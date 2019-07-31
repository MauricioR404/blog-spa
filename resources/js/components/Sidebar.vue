<template>
<div class="sidebar-wrap">
  <div class="single-widget recent-post-widget">
    <h4 class="widget-title">Recent Posts</h4>
    <ul>
      <li v-for="recent in recentPosts" :key="recent.id" class="d-flex flex-row align-items-center">
        <div class="thumbs">
          <img v-for="photo in recent.photos" :key="photo.id" class="img-fluid" :src="'../img/' + photo.url">
        </div>
        <div class="details">
          <router-link :to="{name: 'posts_show', params: {url: recent.url}}">
            <h5 v-text="recent.title"></h5>
          </router-link>
          <p v-text="recent.created_date" class="text-uppercase"></p>
        </div>
      </li>
    </ul>
  </div>

  <div class="single-widget tags-widget">
    <h4 class="widget-title">Tags</h4>
    <ul>
      <li v-for="tag in tags" :key="tag.id">
        <router-link :to="{name: 'tags_posts', params: {tag: tag.url}}" v-text="tag.name"></router-link>
      </li>
    </ul>
  </div>
</div>
</template>

<script>
export default {
  props: ['tags', 'recentPosts']
}
</script>
