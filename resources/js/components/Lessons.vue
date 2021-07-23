<template>
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <span class="text-primary"> Lessons of this series </span>

        <button
          class="btn btn-sm btn-outline-primary"
          @click="createLessonNew()"
        >
          <i class="bi bi-plus-circle"></i>
          Create Lessons
        </button>
      </div>
    </div>

    <div class="card-body">
      <ul class="list-group">
        <li
          class="list-group-item"
          v-for="(lesson, key) in lessonsList"
          :key="lesson.id"
        >
          <div class="d-flex justify-content-between">
            <div class="lesson">
              <i class="bi bi-book-half"></i>
              {{ lesson.title }}
            </div>

            <div class="actions">
              <div class="btn-group" role="group" aria-label="Basic example">
                <button
                  type="button"
                  class="btn btn-sm btn-outline-info"
                  @click="editLesson(lesson)"
                >
                  <i class="bi bi-pencil"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-sm btn-outline-danger"
                  @click="deleteLesson(lesson.id, key)"
                >
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <create-lesson
      :seriesKey="seriesId"
      :lesson="lesson"
      :editing="editing"
      @newLesson="addNewLesson"
      @updatedLesson="updateLesson"
    ></create-lesson>
  </div>
</template>

<script>
import CreateLesson from "./childrens/CreateLesson.vue";
import axios from "axios";
export default {
  props: ["lessons", "series_id"],
  components: {
    CreateLesson,
  },
  data() {
    return {
      lessonsList: JSON.parse(this.lessons),
      seriesId: this.series_id,
      lesson: "",
      editing: false,
    };
  },
  methods: {
    createLessonNew() {
      this.editing = false;
      this.lesson = "";
      $("#createLesson").modal();
    },
    addNewLesson(lessons) {
      this.lessonsList.push(lessons);
    },
    editLesson(lesson) {
      this.editing = true;
      this.lesson = lesson;
      $("#createLesson").modal();
    },
    updateLesson(lesson) {
      /**
       * replace the updated lesson
       */
      let lessonIndex = this.lessonsList.findIndex((l) => {
        return lesson.id == l.id;
      });

      this.lessonsList.splice(lessonIndex, 1, lesson);
    },
    deleteLesson(id, key) {
      if (confirm("Are you sure to delete?")) {
        axios
          .delete(`${this.seriesId}/lesson/${id}`)
          .then((res) => {
            this.lessonsList.splice(key, 1);
          })
          .catch((err) => {
            console.error(err);
          });
      }
    },
  },
};
</script>

<style scoped>
</style>