<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
                <h5 class ="flex">
                    <a :href="'/profiles/'+ data.owner.name" v-text="data.owner.name">
                    </a> said {{ data.created_at }} ...
                </h5>
                <div v-if="signedIn">
                    <favorite :reply="data"></favorite>
                </div>
            </div>
        </div>	
        <div class="panel-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                <button class="btn btn-xs" @click="cancel">Cancel</button>
                <button class="btn btn-xs btn-primary" @click="update">Update</button>
            </div>
            <div v-else v-text="body"></div>
        </div>
        <div class="panel-footer level" v-if="canUpdate">
            <button class="btn btn-xs mr-1" @click="editing = true">Edit</button>
            <button class="btn btn-xs btn-danger" @click="remove">Delete</button>
        </div>
    </div>
</template>

<script>
    import Favorite from './Favorite.vue';
    export default {
        
    props:['data'],

    components:{Favorite},

    data() {
        return {
            editing: false,
            id: this.data.id,
            body: this.data.body
        };
    },

    computed: {
       signedIn() {
           return window.App.signedIn;
       },

       canUpdate() {
           return this.authorize( user => this.data.user_id == user.id);
       }
    },

    methods: {

        update() {
            axios.patch('/replies/' + this.id, {
                body: this.body
            });
            
            this.editing = false;

            flash('Updated');
        },

        remove() {
            axios.delete('/replies/' + this.id);

            this.$emit('deleted', this.id);
            
        },

        cancel() {
            this.editing = false;

            this.body = this.data.body;
        }
    }
};
</script>
