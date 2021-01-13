<template>
  <div class="alldiv">
    <div class="leftdiv">
      <ul v-for="(item, index) in classfity" :key="index">
        <h3 v-show="index == 0">{{ item }}</h3>
        <h3 v-show="index == 1">{{ item }}</h3>
        <h3 v-show="index == 2">{{ item }}</h3>
        <h3 v-show="index == 3">{{ item }}</h3>
        <div class="leftsmalldiv">
          <span
            v-for="items in list.slice(index * 4, (index + 1) * 4)"
            :key="items.id"
          >
            <router-link :to="{ name: 'detail', query: { id: items.title } }">
              {{ items.title }}
            </router-link>
          </span>
        </div>
      </ul>
    </div>

    <div class="cutdiv">
      <el-carousel :autoplay="autoplay" height="600px">
        <el-carousel-item v-for="item in 4" :key="item">
          <ul>
            <li
              v-for="index in lists.slice((item - 1) * 8, item * 8)"
              :key="index.id"
            >
              <div class="pic">
                <div class="imgdiv">
                  <router-link
                    :to="{ name: 'detail', query: { id: index.title } }"
                  >
                    <img :src="index.src" class="imgdiv" />
                  </router-link>
                </div>

                <router-link
                  :to="{ name: 'detail', query: { id: index.title } }"
                >
                  <p class="title">{{ index.title }}</p>
                </router-link>

                <p class="author">{{ index.author }}</p>

                <p class="price">￥{{ index.price }}</p>
              </div>
            </li>
          </ul>
        </el-carousel-item>
      </el-carousel>
    </div>

    <div class="rightdiv">
      <div class="righttitle"></div>
      <div class="rightuldiv">
        <ul>
          <li v-for="(item, index) in sortlist" :key="index">
            <div class="righthoveron">
              <div>
                <span class="rightspan">{{ index + 1 }}</span>

                <div class="pic">
                  <router-link
                    :to="{ name: 'detail', query: { id: item.title } }"
                  >
                    <img :src="item.src" class="img" />
                  </router-link>

                  <router-link
                    :to="{ name: 'detail', query: { id: item.title } }"
                  >
                    <p class="righttitle">{{ item.title }}</p>
                  </router-link>
                  <p class="rightprice">￥{{ item.price }}</p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
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

      middlelist:[],

      classfity: ["名人名著", "悬疑解密", "青春恋爱", "散文小说"],
      list: [
        { id: 1, title: "巴黎圣母院" },
        { id: 2, title: "海底两万里" },
        { id: 3, title: "追风筝的人" },
        { id: 4, title: "百万英镑" },
        { id: 5, title: "白色病毒" },
        { id: 6, title: "嫌疑人X的献身" },
        { id: 7, title: "岛" },
        { id: 8, title: "暗杀大师：秘密仆人" },
        { id: 9, title: "夏目友人帐" },
        { id: 10, title: "IQ265恋人搜查官" },
        { id: 11, title: "安东侯府" },
        { id: 12, title: "爱你是最好的时光" },
        { id: 13, title: "2018中国年度短篇小说" },
        { id: 14, title: "2018中国散文诗年选" },
        { id: 15, title: "欧·亨利短篇小说精选" },
        { id: 16, title: "2018诗歌年选" },
      ],
      sortlist: [
        {
          title: "标题",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          title: "标题",
          price: 20.0,
          src: require("../img/a.jpg"),
        },
        {
          title: "标题",
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

    this.$axios
      .post("http://localhost/Vue/vue05/public/sortlist.php")
      .then((response) => {
        if (response.data != "") {
          let i = 0;
          for (let item of this.sortlist) {
            item.title = response.data[i].图书标题;
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
  border: 1px solid rgb(220, 220, 220);
  margin: 0px auto;
  width: 750px;
  text-align: center;
  float: left;
  margin-left: 160px;
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
  display: table-cell;
  padding-bottom: 10px;
  padding-left: 5px;
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

.imgdiv {
  width: 100px;
  height: 160px;
}

a {
  text-decoration: none;
  color: black;
}

a :hover {
  color: rgb(255, 102, 0);
  text-decoration: underline;
}

.leftdiv {
  border: 1px solid rgb(220, 220, 220);
  float: left;
  width: 220px;
  margin-left: 60px;
}

.alldiv {
  margin-top: 50px;
}

.leftdiv ul {
  display: inline-block;
  margin-left: -30px;
  margin-top: -10px;
}

.leftdiv a {
  color: #696969;
  display: inline-block;
  margin-right: 10px;
  height: 20px;
}
.middelediv {
  float: left;
  margin-left: 50px;
}

.rightdiv {
  background-color: rgb(249, 249, 249);
  float: right;
  margin-right: 100px;
}

.rightuldiv {
  text-align: left;
  border: 1px solid #ccc;
}

.rightuldiv ul li {
  margin-left: -30px;
}

.rightspan {
  font-size: 16px;
  color: red;
  text-align: right;
  float: left;
}

.pic {
  width: 180px;
  height: 50px;
  margin-left: 30px;
  margin-bottom: 10px;
}

.righttitle {
  width: 115px;
  margin-left: 10px;
  margin-top: 0px;
  float: left;
  font-size: 14px;
  text-align: left;
}

.rightprice {
  width: 100px;
  margin-left: 10px;
  margin-top: 0px;
  float: left;
  font-size: 14px;
  display: none;
  color: red;
  text-align: left;
}

.righthoveron :hover img {
  display: block;
}

.righthoveron :hover .rightprice {
  display: inline-block;
}

.righthoveron :hover .pic {
  height: 80px;
}

.img {
  height: 80px;
  width: 54px;
  display: none;
  float: left;
}
</style>