<template lang="">
<!-- Modal -->
<div class="modal fade" id="editSeries" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{series.title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form @submit.prevent = "onSubmit()">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Series title" v-model="title">
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control" placeholder="Series description..." v-model="description"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Thumbnail</label>
                    <input type="file" class="form-control" id="image" @change="handleChange">
                </div>

                <button type="submit" class="btn btn-sm btn-outline-success mx-2">
                    <i class="bi bi-save2"></i>
                    Save
                </button>
                <button type="reset" class="btn btn-sm btn-outline-secondary mx-2">
                    <i class="bi bi-eraser"></i>
                    Clear
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
  props: ["series"],
  data() {
    return {
      title: "",
      description: "",
      image: "",
    };
  },
  methods: {
    handleChange(e) {
      this.image = e.target.files[0];
    },

    onSubmit() {
      const formData = new FormData();
      formData.append("_method", "put");
      formData.append("title", this.title);
      formData.append("description", this.description);
      formData.append("image", this.image);
      axios
        .post(`series/${this.series.slug}`, formData)
        .then((res) => {
          $("#editSeries").modal("hide");
          this.$emit("updatedSeries", res.data);
        })
        .catch((err) => {
          console.error(err);
        });
    },
  },
  watch: {
    series(newValue) {
      this.title = newValue.title;
      this.description = newValue.description;
    },
  },
};
</script>
<style lang="">
</style>