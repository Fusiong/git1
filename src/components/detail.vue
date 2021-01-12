<template>
  <div class="wrap">
    <div class="pics">
      <img :src="book.src" class="deimg" />
    </div>
    <div class="rightdiv">
      <div>
        <span class="spantitle">{{ book.title }}</span>
      </div>

      <div class="detail_wrap">
        <ul>
          <li>标题:{{ book.title }}</li>
          <li>出版社:{{ book.press }}</li>
          <li>ISBN:{{ book.ISBN }}</li>
        </ul>
      
        <ul>
          <li>出版年份:{{ book.year }}</li>
          <li>作者:{{ book.author }}</li>
          <li>定价:￥{{ book.price }}</li>
        </ul>
      </div>

      <div class="buy_wrap">
        <h2>本书价格:<span class="red">￥{{ book.price }}</span></h2>
      </div>
      
      <div class="buy_wrap">
        <h2>总共价格:<span class="red">￥{{ book.price*num }}</span></h2>
      </div>

      
      <div class="buy_number" >
          <span >购买数量:</span>
         <el-input-number v-model="num"  :min="1" :max="20" label="描述文字">
         </el-input-number>

         <el-button style="margin-left:80px;" type="danger" icon="el-icon-shopping-cart-full" >加入购物车</el-button>
      </div>



    </div>
  </div>
</template>

<script>
export default {
  name: "detail",
  data() {
    return {
      Path: this.$route.query.id,
      book: {
        ISBN: 978,
        title: "标题",
        author: "作者",
        press: "出版社",
        year: "2012",
        price: 20.0,
        src: require("../img/a.jpg"),
      },
        num:1
    };
  },
  mounted() {
      let data = new FormData();
      let bookname = this.Path;
      data.append("bookname", bookname);
      const that=this;
      this.$axios
        .post("http://localhost/Vue/vue05/public/detail.php", data)
        .then((response) => {
           if(response.data){
             console.log(response.data);
             that.book.ISBN=response.data[0];
             that.book.title=response.data[1];
             that.book.author=response.data[2];
             that.book.press=response.data[3];
             that.book.year=response.data[4];
             that.book.price=response.data[5];
             that.book.src=require("../img/"+that.book.title+".jpg");
           }else{
             alert("删除失败");
           }
        });
    
  },
};
</script>

<style lang="less" scoped>
.wrap {
  width: 1200px;
  margin: 0px auto;
  margin-left: 100px;
  margin-top: 50px;
}

.pics {
  width: 348px;
  height: 348px;
  line-height: 348px;
  text-align: center;
  border: 1px solid #eaeaea;
  float: left;
}

span{
  padding: 0px;
}

.deimg {
  margin-top: 22px;
 
  width: 200px;
  height: 304px;
}

.rightdiv {
  float: left;
  margin-left: 50px;
  width: 600px;
  height: 350px;
  position: relative;
}

.detail_wrap {
  overflow: hidden;
  border-bottom: 1px dotted #eaeaea;
}

.detail_wrap ul{
  
  padding: 5px 0;
  
  overflow: hidden;
}

.detail_wrap li {
  width: 180px;
  float: left;
  padding-right: 20px;
  color: #999;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.red{
  color: red;
}

.buy_number{  
  position: absolute;
  bottom: 20px;
}

.buy_number span{
  margin-right: 20px;
}

.spantitle{
  font-weight: bolder;
  font-size: 20px;
}

</style>
