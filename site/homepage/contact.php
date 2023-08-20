<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/form.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/contact.css">
</head>

<body>
    <div class="background_header">
        <img style="width: 100%; height: 50%;" src="<?= $CONTENT_URL ?>/imgs/interface/background.png" alt="">
    </div>
    <div class="container__sign-in">
        <div class="title__sign-in">
            <h1>Liên hệ</h1>
            <div class="title_link">
                <a href="<?= $SITE_URL ?>/homepage">Home</a> <i class="fa-solid fa-arrow-right-long"></i> Liên hệ
            </div>
        </div>
    </div>
    <div class="container_contact">
        <div class="box_content">
            <div class="home_contact">
                <img src="<?= $CONTENT_URL ?>/imgs/interface/home.png" alt="">
                <div>
                    <h5 class="location">Thành phố Hồ Chí Minh</h5>
                    <span class="location_content">Công viên phần mềm, Toà nhà Innovation lô 24, Quang Trung, Quận 12,
                        Thành
                        phố Hồ Chí Minh</span>
                </div>
            </div>
            <div class="home_contact">
                <img src="<?= $CONTENT_URL ?>/imgs/interface/phone.png" alt="">
                <div>
                    <h5 class="phone">00 (440) 9865 562</h5>
                    <span class="phone_content">Thứ Hai đến Thứ Sáu, 9 giờ sáng đến 6 giờ chiều</span>
                </div>
            </div>
            <div class="home_contact">
                <img src="<?= $CONTENT_URL ?>/imgs/interface/letter.png" alt="">
                <div>
                    <h5 class="letter">reachy432@gmail.com</h5>
                    <span class="location_content">Gửi cho chúng tôi câu hỏi của bạn bất cứ lúc nào!</span>
                </div>
            </div>
        </div>
        <div class="box_bottom">
            <div class="form_idea">
                <h3>Gửi ý kiến của bạn</h3>
                <form action="">
                    <input class="last_name" type="text" placeholder="Họ">
                    <input class="first_name" type="text" placeholder="Tên">
                    <input class="number" type="text" placeholder="SDT">
                    <input class="mail" type="text" placeholder="Email">
                    <textarea class="idea_content" name="" id="" cols="85" rows="3" placeholder="Ghi chú"></textarea>
                </form>
                <button class="submit" type="submit">Gửi phản hồi</button>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4436614509846!2d106.6256397147191!3d10.853821092269039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1668071271644!5m2!1svi!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>

</html>