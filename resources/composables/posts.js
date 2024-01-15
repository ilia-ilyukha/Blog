
export default usePosts() {
    const posts = ref([]);
    const URL = "http://127.0.0.1:8000";
    const pagination_links = ref(null);
    const props = defineProps(['category_id']);
    let params = '';
    let url_link = '';
    
    if(props.category_id){
        params = '?category_id[eq]=' + props.category_id;
        console.log(props.category_id);
    }
    const getPosts = async (page) => {
        url_link = URL + "/api/v1/posts/" + params;
        // const URL = "http://127.0.0.1:8000/api/v1/posts";

        fetch(url_link)
            .then(responce => responce.json())
            .then(data => {
                posts.value = data.data;
                pagination_links.value = data.links;
                // console.log(pagination_links);
            });

        return { posts, getPosts, pagination_links };
    }
};