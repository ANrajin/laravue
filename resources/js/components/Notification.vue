<template lang="">
    <div>
        
    </div>
</template>
<script>
import EventBus from "../services/EventBus";
export default {
  created() {
    EventBus.on("hello", () => {
      console.log("received");
    });
  },
};
</script>
<style lang="">
</style>