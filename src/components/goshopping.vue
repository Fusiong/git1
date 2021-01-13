<template>
  <div class="center">
    <h2 class="toptitle">购物车界面</h2>
    <ul>
      <li v-for="(item, index) in bookpage" :key="index">
        <div class="uldiv">
          <div class="imgd">
            <img :src="item.src" class="imgdiv" />

            <router-link
              class="righttitle"
              :to="{ name: 'detail', query: { id: item.title } }"
            >
              <span>{{ item.title }}</span>
            </router-link>

            <el-input-number
              class="rightnumber"
              v-model="item.number"
              :min="1"
              :max="100"
              label="描述文字"
              @change="handleChange(item)"
            ></el-input-number>

            <span class="rightprice">单价:{{ item.price }}</span>
            <el-button
              class="rightdelete"
              type="danger"
              icon="el-icon-delete"
              @click="deleteshop(item)"
              circle
            ></el-button>
          </div>
        </div>
      </li>
    </ul>
    <el-button
      class="rightbutton"
      type="danger"
      @click="myorders"
      :disabled="istrues"
      >确定订单</el-button
    >
    <h2 class="rightp">总价:{{ alltotal }}</h2>
  </div>
</template>

<script>
export default {
  name: "goshopping",
  data() {
    return {
      bookpage: [],
      istrues: false,
    };
  },
  computed: {
    alltotal: function () {
      let alltotals = 0;
      let chen = 0;

      for (let items of this.bookpage) {
        let a = Number(items.price);
        let b = Number(items.number);
        chen = this.NumberMul(a, b);
        alltotals = this.NumberAdd(chen, alltotals);
      }

      return alltotals;
    },
  },
  methods: {
    NumberMul: function (arg1, arg2) {
      let m = 0;
      var s1 = arg1.toString();
      var s2 = arg2.toString();
      try {
        m += s1.split(".")[1].length;
      } catch (e) {}
      try {
        m += s2.split(".")[1].length;
      } catch (e) {}

      return (
        (Number(s1.replace(".", "")) * Number(s2.replace(".", ""))) /
        Math.pow(10, m)
      );
    },
    NumberAdd: function (arg1, arg2) {
      var r1, r2, m, n;
      try {
        r1 = arg1.toString().split(".")[1].length;
      } catch (e) {
        r1 = 0;
      }
      try {
        r2 = arg2.toString().split(".")[1].length;
      } catch (e) {
        r2 = 0;
      }
      m = Math.pow(10, Math.max(r1, r2));
      n = r1 >= r2 ? r1 : r2;
      return ((arg1 * m + arg2 * m) / m).toFixed(n);
    },

    handleChange(value) {
      let username = sessionStorage.getItem("userName");

      if (username == "" || username == null) {
        alert("请先登录");
        window.location.href = "login";
        return;
      }

      let account = sessionStorage.getItem("account");

      let data = new FormData();
      data.append("username", account);
      data.append("title", value.title);
      data.append("number", value.number);

      const that = this;

      this.$axios
        .post("http://localhost/Vue/vue05/public/updateshopping.php", data)
        .then((response) => {
          if (response) {
          } else {
          }
        });
    },
    deleteshop(value) {
      let username = sessionStorage.getItem("userName");

      if (username == "" || username == null) {
        alert("请先登录");
        window.location.href = "login";
        return;
      }

      let account = sessionStorage.getItem("account");

      let data = new FormData();
      data.append("username", account);
      data.append("title", value.title);

      const that = this;

      this.$axios
        .post("http://localhost/Vue/vue05/public/deleteshopping.php", data)
        .then((response) => {
          if (response.data) {
            that.bookpage = that.bookpage.filter(
              (item) => item.title !== value.title
            );
          } else {
          }
        });
    },
    myorders() {
      let username = sessionStorage.getItem("userName");

      if (username == "" || username == null) {
        alert("请先登录");
        window.location.href = "login";
        return;
      }

      let account = sessionStorage.getItem("account");

      let data = new FormData();
      data.append("username", account);
      const that = this;

      this.$axios
        .post("http://localhost/Vue/vue05/public/sureshopping.php", data)
        .then((response) => {
          console.log(response.data);
          if (response.data) {
            alert("恭喜你，购买成功，现在跳转到订单");
            that.bookpage = [];
            window.location.href = "userInfo#/myorder";
          } else {
             alert("不好意思，你的购物车没有内容");
          }
        });
    },
  },
  mounted() {
    let username = sessionStorage.getItem("userName");

    if (username == "" || username == null) {
      alert("请先登录");
      window.location.href = "login";
      return;
    }

    let account = sessionStorage.getItem("account");

    let data = new FormData();
    data.append("username", account);

    const that = this;

    this.$axios
      .post("http://localhost/Vue/vue05/public/selectshopping.php", data)
      .then((response) => {
        console.log(data);
        if (response.data != "") {
          for (let items of response.data) {
            let item = {
              title: items.图书标题,
              price: items.价格,
              number: items.数量,
              src: require("../img/" + items.图书标题 + ".jpg"),
            };
            that.bookpage.push(item);
          }
        } else {
          return;
        }
      });
  },
};
</script>

<style lang="less" scoped>
.center {
  margin: 0px auto;
  text-align: center;
  padding-bottom: 100px;
}

.uldiv {
  margin-bottom: 10px;
  border-bottom: 1px solid #eaeaea;
  width: 800px;
}

.imgd {
  position: relative;
}

.righttitle {
  position: absolute;
  top: 20%;
  left: 40%;
}

.rightnumber {
  color: rgb(123, 123, 123);
  position: absolute;
  top: 20%;
  right: 0%;
}

.rightprice {
  position: absolute;
  top: 25%;
  right: -20%;
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

.rightp {
  float: right;
  color: red;
  margin-right: 100px;
}

.rightbutton {
  float: right;
  margin-right: 200px;
  margin-top: 15px;
}

.rightdelete {
  position: absolute;
  top: 25%;
  right: -40%;
}

.toptitle {
  color: red;
}
</style>
