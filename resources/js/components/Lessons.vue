<template>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span class="text-primary">
                    Lessons of this series
                </span>

                <button class="btn btn-sm btn-outline-primary" @click="createLessonNew()">
                    <i class="bi bi-plus-circle"></i>
                    Create Lessons
                </button>
            </div>
        </div>

        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item" v-for="lesson in formattedLessons" :key="lesson.id">
                    <i class="bi bi-book-half"></i>
                    {{lesson.title}}
                </li>
            </ul>
        </div>

        <create-lesson></create-lesson>
    </div>
</template>

<script>
    import CreateLesson from './childrens/CreateLesson.vue'
    export default {
        props: ['lessons'],
        components:{
            CreateLesson
        },
        data() {
            return {
                lessonsList: this.lessons
            }
        },
        methods: {
            createLessonNew(){
                $("#createLesson").modal()
            }
        },
        computed: {
            formattedLessons(){
                return JSON.parse(this.lessons);
            }
        }
    }
</script>

<style scoped>

</style>