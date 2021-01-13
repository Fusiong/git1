<template>
  <div class="center">
    <h2 class="toptitle">搜索界面</h2>
    <ul>
      <li
        v-for="(item, index) in bookpage"
        :key="index"
        v-show="index + 1 > (currentPage - 1) * 10 && index < currentPage * 10"
      >
        <div class="uldiv">
          <div class="imgd">
            <router-link :to="{ name: 'detail', query: { id: item.title } }">
              <img :src="item.src" class="imgdiv" />
            </router-link>
            <router-link :to="{ name: 'detail', query: { id: item.title } }">
              <span class="righttitle">{{ item.title }}</span>
            </router-link>

            <span class="rightdetail"
              >{{ item.author }}/{{ item.press }}/{{ item.year }}年</span
            >
            <span class="rightISBN">ISBN号:{{ item.ISBN }}</span>
            <span class="rightprice">价格:{{ item.price }}</span>
       
            
          </div>
        </div>
      </li>
    </ul>

    <div>
      <el-pagination
        layout="prev, pager, next"
        :total="50"
        :current-page.sync="currentPage"
        @current-change="handleCurrentChange"
      >
      </el-pagination>
    </div>

  </div>
</template>

<script>
export default {
  name: "detailpage",
  data() {
    return {
      bookpage: [],
      pagenum: 1,
      nowid: this.$route.query.id,
      currentPage: 1,
    };
  },
  mounted() {
    let data = new FormData();
    let nowid = this.nowid;
    data.append("id", nowid);
    const that = this;
    this.$axios
      .post("http://localhost/Vue/vue05/public/detailpage.php", data)
      .then((response) => {
        if (response.data) {
          for (let items of response.data) {
            let item = {
              title: items.图书标题,
              press: items.出版社,
              author: items.作者,
              year: items.出版年份,
              price: items.价格,
              ISBN: items.ISBN,
              src: require("../img/" + items.图书标题 + ".jpg"),
            };
            that.bookpage.push(item);
          }
         
        } else {
        }
      });
  },
  methods: {
    handleCurrentChange(val) {
      this.currentPage = val;
      console.log(val);
    },
  },
};
</script>

<style lang="less" scoped>
.center {
  margin: 0px auto;
  text-align: center;
}

.uldiv {
  margin: 0px auto;
  text-align: center;
  margin-bottom: 10px;
  border-bottom: 1px solid #eaeaea;
  width: 800px;
}

.imgd {
  position: relative;
}

.righttitle {
  position: absolute;
}

.rightdetail {
  color: rgb(123, 123, 123);
  position: absolute;
  top: 20%;
}

.rightISBN {
  color: rgb(123, 123, 123);
  position: absolute;
  top: 40%;
}

.rightprice {
  position: absolute;
  top: 80%;
}



.imgdiv {
  margin-left: -300px;
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

.toptitle{
  color: brown;
}
</style>
