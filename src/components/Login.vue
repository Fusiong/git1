<template>
  <div class="login_container">
    <div class="login_box">
      <div class="imgdiv">
        <img src="../assets/Steam.png" alt="" />
      </div>
      <a href="Home">跳转</a>

      <el-form
        :model="loginForm"
        :rules="rules"
        ref="loginFormRef"
        label-width="55px"
      >
        <el-form-item label="账号:" prop="username">
          <el-input
            v-model="loginForm.username"
            prefix-icon="el-icon-user"
            placeholder="账号"
          >
          </el-input>
        </el-form-item>

        <el-form-item label="密码:" prop="password">
          <el-input
            v-model="loginForm.password"
            prefix-icon="el-icon-lock"
            placeholder="密码"
            type="password"
          >
          </el-input>
        </el-form-item>

        <el-form-item>
          <el-button class="letterbtns" type="primary" @click="login" round
            >登陆</el-button
          >

          <router-link to="/register">
            <el-button class="rightbtns" type="info" round>注册</el-button>
          </router-link>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>
export default {
  name: "login",

  data() {
    return {
      loginForm: {
        username: "",
        password: "",
      },
      rules: {
        username: [
          { required: true, message: "请输入登陆名称", trigger: "blur" },
          {
            min: 1,
            max: 11,
            message: "长度在 1 到 11 个字符",
            trigger: "blur",
          },
        ],
        password: [
          { required: true, message: "请选择密码", trigger: "blur" },
          {
            min: 6,
            max: 15,
            message: "长度在 6 到 15 个字符",
            trigger: "blur",
          },
        ],
      },
    };
  },
  methods: {
    login() {
      this.$refs.loginFormRef.validate((valid) => {
        if (valid) {
          let data = new FormData();
          data.append("username", this.loginForm.username);
          data.append("password", this.loginForm.password);

          this.$axios
            .post("http://localhost/Vue/vue05/public/test.php", data)
            .then((response) => {
              console.log(response.data);
              if (response.data != "") {
                alert("欢迎登陆," + response.data[0]);

                sessionStorage.setItem("userName", response.data[0]);
                sessionStorage.setItem("account", response.data[1]);
                sessionStorage.setItem("gender", response.data[2]);
                sessionStorage.setItem("phone", response.data[3]);

                window.location.href = "home";
              } else {
                alert("账号或密码有误");
              }
            });
        } else {
          return;
        }
      });
    },
  },
};
</script>

<style lang="less" scoped>
.login_container {
  background-image: url("../assets/preview.jpg");
  height: 100%;
}
.login_box {
  width: 450px;
  height: 300px;
  background-color: #fff;
  border-radius: 10px;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  padding: 20px;
  padding-right: 40px;
}

.letterbtns {
  position: relative;
  float: left;
}

.rightbtns {
  position: relative;
  float: right;
}

.imgdiv {
  margin: 0px auto;
  text-align: center;

  img {
    width: 40%;
    height: 40%;
    background-color: #eee;
  }
}
</style>
