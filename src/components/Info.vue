<template>
  <div class="rightMain">

    <el-form
      :model="loginForm"
      :rules="rules"
      ref="loginFormRef"
      label-width="80px"
    >
      <div>
        <el-form-item label="账号:">
          {{ loginForm.username }}
        </el-form-item>
      </div>

      <div>
        <el-form-item label="昵称:" prop="name">
          <el-input v-model="loginForm.name"  prefix-icon="el-icon-user-solid"></el-input>
        </el-form-item>
      </div>

      <div>
        <el-form-item label="性别:" prop="gender">
          <el-radio v-model="loginForm.gender" label="男">男</el-radio>
          <el-radio v-model="loginForm.gender" label="女">女</el-radio>
        </el-form-item>
      </div>

      <div>
        <el-form-item label="联系电话:" prop="phone">
          <el-input v-model="loginForm.phone"  prefix-icon="el-icon-phone"></el-input>
        </el-form-item>
      </div>

      <div>
        <el-form-item>
          <el-button @click="sumbit">修改基本信息</el-button>
        </el-form-item>
      </div>
    </el-form>

  </div>
</template>

<script>
export default {
  name: "Info",
  data() {
    return {
      loginForm: {
        name: "",
        username: "",
        password: "",
        gender: "男",
        phone: "",
      },
      rules: {
        phone: [
          {
            min: 11,
            max: 11,
            message: "手机号码必须必须为11位",
            trigger: "blur",
          },
        ],
        name: [
          { required: true, message: "请输入昵称", trigger: "blur" },
          {
            min: 2,
            max: 20,
            message: "长度在 2 到 20 个字符",
            trigger: "blur",
          },
        ],
      },
    };
  },
  mounted() {
    let username = sessionStorage.getItem("userName");
    let account = sessionStorage.getItem("account");
    let gender = sessionStorage.getItem("gender");
    let phone = sessionStorage.getItem("phone");


    if (username == "" || username == null) {
      window.location.href = "home";
    }

    this.loginForm.username = account;
    this.loginForm.name = username;

    if (phone == "null" || phone == null) {
      this.loginForm.phone = "";
    } else {
      this.loginForm.phone = phone;
    }
    this.loginForm.gender = gender;
  },

  methods: {
    sumbit() {
        let username = sessionStorage.getItem("userName");
      if (username == "" || username == null) {
        window.location.href = "home";
      } else {
        this.$refs.loginFormRef.validate((valid) => {
          if (valid) {
            let data = new FormData();
            data.append("username", this.loginForm.username);
            data.append("name", this.loginForm.name);
            data.append("gender", this.loginForm.gender);
            data.append("phone", this.loginForm.phone);
            this.$axios
            .post("http://localhost/Vue/vue05/public/Info.php", data)
            .then((response) => {
              alert("修改数据成功," + this.loginForm.name);
                sessionStorage.setItem("userName", this.loginForm.name);
                sessionStorage.setItem("gender", this.loginForm.gender);
                sessionStorage.setItem("phone",  this.loginForm.phone);

            });


          }
        });
      }
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
  width: 300px;
}

.rightMain span {
  font-size: 14px;
  color: #606266;
}
</style>
