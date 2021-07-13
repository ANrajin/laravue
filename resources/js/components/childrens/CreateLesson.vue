<template>
    <!-- Modal -->
    <div class="modal fade" id="createLesson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create a New Lesson</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" v-model="title" placeholder="Lesson title..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="video">Video Id</label>
                            <input type="text" id="video" v-model="video" placeholder="Vimeo video id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="episode">Episode</label>
                            <input type="number" id="episode" class="form-control" v-model="episode" placeholder="Episode number">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea v-model="description" id="description" rows="10" class="form-control" placeholder="Description..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-sm btn-outline-success">
                            <i class="bi bi-save2"></i>
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                title: '',
                video: '',
                episode: '',
                description: ''
            }
        },
    }
</script>

<style scoped>

</style>