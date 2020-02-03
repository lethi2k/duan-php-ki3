<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Danh Mục</label>
  </div>
  
</div>




  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Iddm</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="iddm" >
                        <?php 
                        $sql="select * from danhmuc";
                        $kq=$conn ->query($sql);
                        foreach ($kq as $key => $row){
                        ?>
                        <option  selected><?php echo $row['tendm']; ?></option>
                        <?php } ?>
                    </select>
                </div>