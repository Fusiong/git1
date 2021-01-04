<template>
  <div class="cutdiv">
    <span class="demonstration">默认 Hover 指示器触发</span>

    <el-carousel :autoplay="autoplay" height="550px">
      <el-carousel-item v-for="item in 4" :key="item">
        <ul>
          <li v-for="item in 8" :key="item">
            <div class="pic">
            <div class="imgdiv">
              <img src="@/img/a.jpg">
            </div>
              
              <p class="title">标题我是火车王</p>

              <p class="author">作者啊啊啊</p>

              <p class="price">￥10.50</p>
              
            </div>
          </li>
        </ul>
      </el-carousel-item>
    </el-carousel>
  </div>
</template>

<script>
export default {
  data() {
    return {
      autoplay: false,
    };
  },
};
</script>


<style lang="less" scoped>
.cutdiv {
  margin: 0px auto;
  width: 750px;
  text-align: center;
}

.el-carousel__item h3 {
  color: #475669;
  font-size: 14px;
  opacity: 0.75;
  line-height: 150px;
  margin: 0;
}

.el-carousel__item:nth-child(2n) {
  background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n + 1) {
  background-color: #d3dce6;
}

.cutdiv li {
  float: left;
  height: 265px;
  overflow: hidden;
  vertical-align: middle;
  width: 25%;
  margin: 10px 0 0 0;
}

.pic {
  text-align: center;
  position: relative;
  display: table-cell;
  vertical-align: middle;
}

.title {
  padding: 5px 1px 1px;
  text-align: center;
  display: block;
  margin: 0px auto;
  height: 32px;
  line-height: 32px;
}

.author {
  margin: 0 auto;
  color: #999;
  height: 24px;
  line-height: 24px;
   text-align: left;
}


.price{
    padding-top: 3px;
    margin: 0 auto;
    color: #DA0000;
    font-weight: bold;
    font-size: 15px;
    text-align: left;
}

img{
  width:100px;
  height: 160px;
}

.imgdiv{
   width:100px;
  height: 160px;
}

</style>