<template>
  <div>
    <h1>Hello from Vue!! </h1>
    <h4>Welcome {{ user.name }}</h4>
     <!---<pre>{{ user }}</pre> -- to show full user object -->
      <button @click="fetchPosts">Fetch Posts</button>
        <div v-if="posts.length">
            <h2>Posts:</h2>
            <ul>
                <li v-for="post in posts" :key="post.id">
                    <h3>{{ post.title }}</h3>
                    <p>{{ post.body }}</p>
                </li>
            </ul>
        </div>
  </div>
</template>

<script>
export default {
  name: 'App',
  props: {
    'user': {
      type: Object,
      required: false
    },
    'posts' : {
      type: Array,
      required: false
    }
    },
    data() {
        return {
            posts: []
        };
    },
    methods: {
        fetchPosts() {
            // Fetch user data from the server
            fetch('https://jsonplaceholder.typicode.com/posts')
                .then(response => response.json())
                .then(data => {
                    this.posts = data;
                })
                .catch(error => console.error('Error fetching posts:', error));
        }
      // Add any methods you need here
    },
};
</script>
