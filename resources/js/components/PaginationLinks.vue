<template>
<nav v-if="pagination.last_page > 1">
  <ul class="pagination">
    <li :class="['page-item', prevDisabled()]">
      <router-link class="page-link" tabindex="-1" :to="{ name: $route.name, query: {page: prevPage() }}">
        <i class="ti ti-angle-left"></i>
      </router-link>
    </li>

    <li v-for="page in pagination.last_page" :key="page.id" class="page-item">
      <router-link :class="['page-link','page', getActiveClass(page)]" :to="{
                  name: $route.name,
                  query: {
                    page: page
                  }
                }">{{ page }}
      </router-link>
    </li>

    <li :class="['page-item', nextDisabled()]">
      <router-link class="page-link" :to="{
                  name: $route.name,
                  query: {
                    page: nextPage()
                  }
                }"><i class="ti ti-angle-right"></i>
      </router-link>
    </li>
  </ul>
</nav>
</template>

<script>
export default {
  props: ['pagination'],
  methods: {
    getActiveClass(page) {
      return [
        !this.$route.query.page && page == 1 ? 'active' : ''
      ];
    },
    prevPage() {
      return this.pagination.current_page - 1
    },
    nextPage() {
      return this.pagination.current_page + 1
    },
    prevDisabled() {
      return [
        this.pagination.current_page == 1 ? 'disabled' : ''
      ];
    },
    nextDisabled() {
      return [
        this.pagination.current_page == this.pagination.last_page ? 'disabled' : ''
      ];
    }
  }
}
</script>
