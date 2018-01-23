<script>
import Replies from '../components/Replies.vue';
export default {

  props: ['thread'],

  components:{Replies},
  
  data() {
    return {
      repliesCount: this.thread.replies_count,
    };
  },
}
</script>