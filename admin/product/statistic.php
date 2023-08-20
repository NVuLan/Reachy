<style>
    <?php if(!isset($massage)){ ?>
        .circle{
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: conic-gradient(
                <?php 
                    if(!$level1==0){
                        echo "gray 0%,
                            gray $level1%";
                        $check = 0;
                        for($i = 1;$i<5;$i++){
                            if($level[$i]==1){
                                $check = 1;
                                break;
                            }
                        }
                        if($check==0){
                            echo ",";
                        }
                    }
                    if(!$level2==0){
                        $level2+=$level1;
                        echo "green $level1%,
                            green $level2%";
                        $check = 0;
                        for($i = 2;$i<5;$i++){
                            if($level[$i]==1){
                                $check = 1;
                                break;
                            }
                        }
                        if($check==0){
                            echo ",";
                        }
                    }
                    if(!$level3==0){
                        $level3+=$level2;
                        echo "blue $level2%,
                            blue $level3%";
                        $check = 0;
                        for($i = 4;$i<5;$i++){
                            if($level[$i]==1){
                                $check = 1;
                                break;
                            }
                        }
                        if($check==0){
                            echo ",";
                        }
                    }
                    if(!$level4==0){
                        $level4+=$level3;
                        echo "yellow $level3%,
                            yellow $level4%";
                        if(!$level5==0){
                            echo ",";
                        }
                    }
                    if(!$level5==0){
                        $level5+=$level4;
                        echo "red 0%,
                            red $level5%";
                    }
                ?>
            );
        }
    <?php } ?>
</style>
<div>
    <h1>Đánh giá sản phẩm</h1>
    <?php if(isset($massage)){
        echo $massage;
    }else{ ?>
        <div class="left">
            <div class="circle"></div>
        </div>
        <div class="right">
            <div>
                <h2>Chú thích</h2>
                <div class="note_row">
                    <div class="mini_circle" style="width: 20px;height: 20px;border-radius: 50%;background-color: gray;"></div>
                    <a href="">Đánh giá 1 sao</a>
                </div>
                <div class="note_row">
                    <div class="mini_circle" style="width: 20px;height: 20px;border-radius: 50%;background-color: green;"></div>
                    <a href="">Đánh giá 2 sao</a>
                </div>
                <div class="note_row">
                    <div class="mini_circle" style="width: 20px;height: 20px;border-radius: 50%;background-color: blue;"></div>
                    <a href="">Đánh giá 3 sao</a>
                </div>
                <div class="note_row">
                    <div class="mini_circle" style="width: 20px;height: 20px;border-radius: 50%;background-color: yellow;"></div>
                    <a href="">Đánh giá 4 sao</a>
                </div>
                <div class="note_row">
                    <div class="mini_circle" style="width: 20px;height: 20px;border-radius: 50%;background-color: red;"></div>
                    <a href="">Đánh giá 5 sao</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>