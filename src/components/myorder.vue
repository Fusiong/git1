<template>
  <div class="rightMain">
    <table class="t1">
      <tr>
        <th scope="col">收件人</th>
        <th scope="col">图书</th>
        <th scope="col">数量</th>
        <th scope="col">单价</th>
        <th scope="col">总金额</th>
        <th scope="col">具体时间</th>
      </tr>

      <tr v-for="(item, index) in myorders" :key="index">
        <td>{{ item.username }}</td>
        <td>{{ item.title }}</td>
        <td>{{ item.number }}</td>
        <td>{{ item.price }}</td>
        <td>{{ item.total }}</td>
        <td>{{ item.time }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  name: "myorder",
  data() {
    return {
      myorders: [],
    };
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
      .post("http://localhost/Vue/vue05/public/addorder.php", data)
      .then((response) => {
        if (response.data != "") {
          console.log(response.data);
          for (let items of response.data) {
            let item = {
              username:items.账号,
              title: items.图书标题,
              price: items.价格,
              number: items.数量,
              total:that.NumberMul(Number(items.价格),Number(items.数量)),
              time:items.日期
            };
            that.myorders.push(item);
          }
        } else {
          return;
        }
      });

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
  },
};
</script>

<style lang="less" scoped>
.rightMain {
  float: left;
  padding-top: 10px;
  overflow: hidden;
  padding-left: 50px;
  width: 600px;
}

.t1 {
  border: 1px;
  border-style: solid;
  border-collapse: collapse;
  border-color: #ccc;
  width: 100%;
}

.t1 th {
  display: table-cell;
  vertical-align: inherit;
  font-weight: bold;
  border: 1px;
  border-style: solid;
  text-align: center;
  background-color: #f0f0f0;
  padding: 8px;
  color: #333333;
}

.t1 td {
  border: 1px;
  border-style: solid;
  padding: 5px;
  text-align: center;
}
</style>
