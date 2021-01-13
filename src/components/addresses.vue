<template>
  <div class="rightMain">
    <el-form label-width="80px">
      <el-form-item label="所在地区:">
        <v-distpicker
          @selected="Onselected"
          @province="Onpro"
          @city="Oncity"
          @area="Onarea"
        ></v-distpicker>
      </el-form-item>
      <el-form-item label="详细地址:">
        <el-input
          v-model="addresses"
          style="width: 200px; padding-right: 10px"
        ></el-input>
        <span style="color: red">*最多三个地址</span>
      </el-form-item>
      <el-form-item>
        <el-button @click="sumbit">添加地址</el-button>
      </el-form-item>
    </el-form>

    <el-main>
      <el-table :data="tableData">
        <el-table-column label="姓名" width="120">
          <template slot-scope="scope">
            <span>{{ scope.row.name }}</span>
          </template>
        </el-table-column>

        <el-table-column label="手机" width="140">
          <template slot-scope="scope">
            <span>{{ scope.row.phone }}</span>
          </template>
        </el-table-column>

        <el-table-column prop="address" label="详细地址">
          <template slot-scope="scope">
            <span>{{ scope.row.address }}</span>
          </template>
        </el-table-column>

        <el-table-column label="删除">
          <template slot-scope="scope">
            <el-button
              type="danger"
              icon="el-icon-delete"
              @click="deleted(scope.$index, scope.row)"
              circle
            ></el-button>
          </template>
        </el-table-column>
      </el-table>
    </el-main>
  </div>
</template>

<script>
import VDistpicker from "v-distpicker";
export default {
  name: "addresses",
  components: { VDistpicker },
  data() {
    return {
      province: "",
      city: "",
      area: "",
      addresses: "",
      isaddress: false,
      tableData: [],
    };
  },
  mounted() {
    let username = sessionStorage.getItem("userName");
    let phone = sessionStorage.getItem("phone");
    if (username == "" || username == null) {
      window.location.href = "home";
    }
    let data = new FormData();
    let account = sessionStorage.getItem("account");
    data.append("username", account);

    this.$axios
      .post("http://localhost/Vue/vue05/public/selectadd.php", data)
      .then((response) => {
        for (let item in response.data) {
          if (response.data[item] != null) {
            let items = {
              name: username,
              phone: phone,
              address: response.data[item],
            };

            this.tableData.push(items);
          }
        }

        if (response.data != "") {
        } else {
        }
      });
  },
  methods: {
    sumbit() {
    let username = sessionStorage.getItem("userName");
  
    if (username == "" || username == null) {
      alert("请先登录");
      window.location.href = "login";
      return;
    }

      if (this.isaddress && this.addresses != "") {
        let data = new FormData();
        let addre = this.province + this.city + this.area + this.addresses;
        let account = sessionStorage.getItem("account");
        const that = this;
        console.log(addre);
        data.append("username", account);
        data.append("addre", addre);

        let username = sessionStorage.getItem("userName");
        let phone = sessionStorage.getItem("phone");

        this.$axios
          .post("http://localhost/Vue/vue05/public/addresses.php", data)
          .then((response) => {
            console.log(response.data);
            if (response.data) {
              alert("添加地址成功");
              let item={
              name: username,
              phone: phone,
              address: addre,
              }
              this.tableData.push(item);
            } else {
              alert("填写的地址已满三个");
            }
          });
      } else {
        alert("所在地区和详细地址都要填写仔细");
      }
    },
    deleted(index, row) {
    let username = sessionStorage.getItem("userName");
  
    if (username == "" || username == null) {
      alert("请先登录");
      window.location.href = "login";
       return;
    }


      let data = new FormData();
      let account = sessionStorage.getItem("account");
      let addre = row["address"];
      data.append("username", account);
      data.append("addre", addre);
      const that = this;
      this.$axios
        .post("http://localhost/Vue/vue05/public/deleteadd.php", data)
        .then((response) => {
          if (response.data) {
            alert("删除成功");
            that.tableData = that.tableData.filter(
              (item) => item.address !== addre);
          } else {
            alert("删除失败");
          }
        });
    },
    Onpro(data) {
      this.isaddress = false;
    },
    Oncity(data) {
      this.isaddress = false;
    },
    Onarea(data) {
      this.isaddress = false;
    },

    Onselected(data) {
      this.isaddress = true;
      this.province = data.province.value;
      this.city = data.city.value;
      this.area = data.area.value;
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
  width: 700px;
}
</style>
