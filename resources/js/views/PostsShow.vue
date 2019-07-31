<template>
<div>
  <section class="blog-lists-section section-gap-full">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-details">
            <div class="post-thumb relative">
              <div class="overlay overlay-bg"></div>
              <img class="img-fluid" v-for="photo in post.photos" :key="photo.id" :src="'../img/' + photo.url">
            </div>
            <div class="post-details">
              <ul class="tags">
                <li v-for="tag in post.tags" :key="tag.id">
                  <router-link :to="{name: 'tags_posts', params: {tag: tag.url}}" v-text="tag.name">
                  </router-link>
                </li>
              </ul>
                <h1 v-text="post.title"></h1>

              <div v-html="post.body"></div>
            </div>
          </div>

          <disqus-comments></disqus-comments>

        </div>

        <div class="col-lg-4">
          <sidebar :tags="tags" :recentPosts="recentPosts"></sidebar>
        </div>
      </div>
    </div>
  </section>
</div>
</template>

<script>
export default {
  props: ['url'],
  data() {
    return {
      post: {},
      tags: [],
      recentPosts: []
    }
  },
  mounted() {
    axios.get(`/api/blog/${this.url}`)
      .then(res => {
        this.post = res.data.post;
        this.tags = res.data.tags;
        this.recentPosts = res.data.recentPosts;
      })
      .catch(errors => {
        console.log(errors);
      });
  },
}
</script>
<style>
.blog-details blockquote {
  border-left: 5px solid #691cff;
  font-size: 14px;
  margin-bottom: 35px;
  margin-left: 20px;
  margin-top: 35px;
  padding-left: 15px;
}
</style>
