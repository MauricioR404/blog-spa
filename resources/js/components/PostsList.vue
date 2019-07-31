<template>
<section class="blog-lists-section section-gap-full">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="blog-lists">

          <posts-list-item v-for="post in posts" :key="post.id" :post="post" />

          <pagination-links :pagination="pagination" />

        </div><!-- .blog-lists -->
      </div><!-- .col-lg-8-->

      <div class="col-lg-4">
        <sidebar :tags="tags" :recentPosts="recentPosts" />
      </div><!-- .col-lg-4 -->
    </div><!-- .row -->
  </div><!-- .container -->
</section>
</template>

<script>
export default {
  props: ['url'],
  data() {
    return {
      posts: [],
      tags: [],
      recentPosts: [],
      pagination: [],
    }
  },
  mounted() {
    axios.get(`${this.url}?page=${this.$route.query.page || 1}`)
      .then(res => {
        this.posts = res.data.posts.data;
        this.tags = res.data.tags;
        this.recentPosts = res.data.recentPosts;
        this.pagination = res.data.posts;
        delete this.pagination.data
      })
      .catch(errors => {
        console.log(errors);
      });
  },
}
</script>

<style>
.page.active {
  background: #691cff;
  color: #fff;
  border-color: transparent;
}
</style>
