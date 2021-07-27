<template lang="">
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in items" :key="index">
                    <th scope="row">{{++index}}</th>
                    <td>
                        {{item.title}}
                        
                        <div class="mt-4">
                            <button type="button" class="btn btn-link p-0 mr-3" @click="editSeries(item)">Edit</button>
                            <button type="button" class="btn btn-link p-0 mr-3">Delete</button>
                        </div>
                    </td>
                    <td>
                        <p class="m-0 pb-1">{{item.created_at}}</p>
                        <span class="badge badge-success">Published</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <update-series :series="seriesItem" @updatedSeries="updatedSeries"></update-series>
</template>
<script>
import UpdateSeries from "./childrens/UpdateSeries.vue";
export default {
  components: {
    UpdateSeries,
  },
  props: ["series"],
  data() {
    return {
      items: JSON.parse(this.series),
      seriesItem: "",
    };
  },
  methods: {
    editSeries(item) {
      this.seriesItem = item;
      $("#editSeries").modal();
    },
    updatedSeries(series) {
      /**
       * replace the updated lesson
       */
      let seriesIndex = this.items.findIndex((s) => {
        return series.id == s.id;
      });

      this.items.splice(seriesIndex, 1, series);
    },
  },
};
</script>
<style lang="">
</style>