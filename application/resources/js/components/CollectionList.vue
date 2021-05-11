<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Collection List</div>

                    <div class="card-body">
                        <div>
                            <ul v-for="col in collection" :key="col.title">
                                <li>
                                    <span><a v-bind:href="'/collections/' + col.id">{{ col.title }}</a></span><br>
                                    <span>{{ col.description }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                collection: {}
            };
        },
        props: [
            'owner',
        ],
        methods: {
            loadCollections: function () {

            }
        },
        created() {
            var self = this;
            console.log('Component mounted.');
            //this.LoadCollections();
            axios.get('/api/collections', {
                params: {
                    owner: self.owner
                }
            })
                .then(function(response){
                    console.log(response);
                    self.collection = response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            console.log('Collections Loaded.');
        },
    }
</script>
