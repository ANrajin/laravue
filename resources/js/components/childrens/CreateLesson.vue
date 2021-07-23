<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createLesson"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" v-if="editing">
            Edit This Lesson
          </h5>
          <h5 class="modal-title" id="exampleModalLabel" v-else>
            Create a New Lesson
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form">
            <div class="form-group">
              <label for="title">Title</label>
              <input
                type="text"
                id="title"
                v-model="title"
                placeholder="Lesson title..."
                class="form-control"
              />
            </div>
            <div class="form-group">
              <label for="video">Video Id</label>
              <input
                type="text"
                id="video"
                v-model="video"
                placeholder="Vimeo video id"
                class="form-control"
              />
            </div>
            <div class="form-group">
              <label for="episode">Episode</label>
              <input
                type="number"
                id="episode"
                class="form-control"
                v-model="episode"
                placeholder="Episode number"
              />
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea
                v-model="description"
                id="description"
                rows="10"
                class="form-control"
                placeholder="Description..."
              ></textarea>
            </div>

            <button
              type="button"
              class="btn btn-sm btn-outline-success"
              v-if="editing"
              @click="updateLesson"
            >
              <i class="bi bi-save2"></i>
              Save Lesson
            </button>
            <button
              type="button"
              class="btn btn-sm btn-outline-success"
              v-else
              @click="createNewLesson()"
            >
              <i class="bi bi-save2"></i>
              Create Lesson
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["seriesKey", "lesson", "editing"],
  data() {
    return {
      title: "",
      video: "",
      episode: 0,
      description: "",
    };
  },
  methods: {
    createNewLesson() {
      axios
        .post(`${this.seriesKey}/lesson`, {
          series_id: this.seriesKey,
          title: this.title,
          description: this.description,
          episode_number: this.episode,
          video_id: this.video,
        })
        .then((res) => {
          this.$emit("newLesson", res.data);
          $("#createLesson").modal("hide");
          document.getElementById("form").reset();
        })
        .catch((err) => {
          console.error(err);
        });
    },

    updateLesson() {
      axios
        .put(`${this.seriesKey}/lesson/${this.lesson.id}`, {
          title: this.title,
          description: this.description,
          episode_number: this.episode,
          video_id: this.video,
        })
        .then((res) => {
          $("#createLesson").modal("hide");
          document.getElementById("form").reset();
          this.$emit("updatedLesson", res.data);
        })
        .catch((err) => {
          console.error(err);
        });
    },
  },

  watch: {
    lesson(newValue) {
      this.title = this.editing ? newValue.title : "";
      this.video = this.editing ? newValue.video_id : "";
      this.episode = this.editing ? newValue.episode_number : 0;
      this.description = this.editing ? newValue.description : "";
    },
  },
};
</script>

<style scoped>
</style>