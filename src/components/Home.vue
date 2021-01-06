<template>
  <div class="cutdiv">
    <el-carousel :autoplay="autoplay" height="600px">
      <el-carousel-item v-for="item in 4" :key="item">
        
        <ul>
      
          <li
            v-for="index in lists.slice(0, 8)"
            :key="index.id"
            v-show="item == 1"
          >
            <div class="pic">
              <div class="imgdiv">
                <img :src="index.src" />
              </div>

              <p class="title">{{ index.title }}</p>

              <p class="author">{{ index.author }}</p>

              <p class="price">￥{{ index.price }}</p>
            </div>
          </li>
       

          <li
            v-for="index in lists.slice(8, 16)"
            :key="index.id"
            v-show="item == 2"
          >
            <div class="pic">
              <div class="imgdiv">
                <img :src="index.src" />
              </div>

              <p class="title">{{ index.title }}</p>

              <p class="author">{{ index.author }}</p>

              <p class="price">￥{{ index.price }}</p>
            </div>
          </li>

          <li
            v-for="index in lists.slice(16, 24)"
            :key="index.id"
            v-show="item == 3"
          >
            <div class="pic">
              <div class="imgdiv">
                <img :src="index.src" />
              </div>

              <p class="title">{{ index.title }}</p>

              <p class="author">{{ index.author }}</p>

              <p class="price">￥{{ index.price }}</p>
            </div>
          </li>

          <li
            v-for="index in lists.slice(24, 32)"
            :key="index.id"
            v-show="item == 4"
          >
            <div class="pic">
              <div class="imgdiv">
                <img :src="index.src" />
              </div>

              <p class="title">{{ index.title }}</p>

              <p class="author">{{ index.author }}</p>

              <p class="price">￥{{ index.price }}</p>
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
      lists: [
        {
          id: 1,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 2,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 3,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 4,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 5,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 6,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 7,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 8,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 9,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 10,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 11,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 12,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 13,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 14,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 15,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 16,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 17,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 18,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 19,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 20,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 21,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 22,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 23,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 24,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 25,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 26,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 27,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 28,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 29,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 30,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 31,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          id: 32,
          title: "标题",
          author: "作者",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
      ],
    };
  },
  mounted() {
    this.$axios
      .post("http://localhost/Vue/vue05/public/recommend.php")
      .then((response) => {
        console.log(response.data);
        if (response.data != "") {
          let i = 0;
          for (let item of this.lists) {
            item.title = response.data[i].图书标题;
            item.author = response.data[i].作者;
            item.price = response.data[i].价格;
            item.src = require("../img/" + response.data[i].图书标题 + ".jpg");
     

            i++;
          }
        } else {
          return;
        }
      });
  },
};
</script>


<style lang="less" scoped>
.cutdiv {
  margin: 0px auto;
  width: 750px;
  text-align: center;
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
  text-align: left;
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

.price {
  padding-top: 3px;
  margin: 0 auto;
  color: #da0000;
  font-weight: bold;
  font-size: 15px;
  text-align: left;
}

img {
  width: 100px;
  height: 160px;
}

.imgdiv {
  width: 100px;
  height: 160px;
}



</style>