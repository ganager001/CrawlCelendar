<?php
    function getCurrentDate() {
        $current_date = array(
            'day' => date("d"), // Lấy ngày hiện tại
            'month' => date("m"), // Lấy tháng hiện tại
            'year' => date("Y") // Lấy năm hiện tại
        );
        return $current_date;
    }

    function loadDomTarget($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Lỗi cURL: ' . curl_error($ch);
            exit;
        }
        curl_close($ch);
        $dom = new DOMDocument;
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        return $xpath;
    }

    class Targets{
        
        public $_thu = [
            'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy', 'Chủ Nhật'
        ];

        public $_ngayAm = [
            'ngày Giáp Tý', 'ngày Ất Sửu', 'ngày Bính Dần', 'ngày Đinh Mão', 'ngày Mậu Thìn', 'ngày Kỷ Tỵ',
            'ngày Canh Ngọ', 'ngày Tân Mùi', 'ngày Nhâm Thân', 'ngày Quý Dậu', 'ngày Giáp Tuất', 'ngày Ất Hợi',
            'ngày Bính Tý', 'ngày Đinh Sửu', 'ngày Mậu Dần', 'ngày Kỷ Mão', 'ngày Canh Thìn', 'ngày Tân Tỵ',
            'ngày Nhâm Ngọ', 'ngày Quý Mùi', 'ngày Giáp Thân', 'ngày Ất Dậu', 'ngày Bính Tuất', 'ngày Đinh Hợi',
            'ngày Mậu Tý', 'ngày Kỷ Sửu', 'ngày Canh Dần', 'ngày Tân Mão', 'ngày Nhâm Thìn', 'ngày Quý Tỵ',
            'ngày Giáp Ngọ', 'ngày Ất Mùi', 'ngày Bính Thân', 'ngày Đinh Dậu', 'ngày Mậu Tuất', 'ngày Kỷ Hợi',
            'ngày Canh Tý', 'ngày Tân Sửu','ngày Nhâm Dần', 'ngày Quý Mão', 'ngày Giáp Thìn', 'ngày Ất Tỵ',
            'ngày Bính Ngọ', 'ngày Đinh Mùi', 'ngày Mậu Thân', 'ngày Kỷ Dậu', 'ngày Canh Tuất','ngày Tân Hợi',
            'ngày Nhâm Tý','ngày Quý Sửu','ngày Giáp Dần','ngày Ất Mão','ngày Bính Thìn','ngày Đinh Tỵ',
            'ngày Mậu Ngọ','ngày Kỷ Mùi','ngày Canh Thân','ngày Tân Dậu', 'ngày Nhâm Tuất', 'ngày Quý Hợi',
        ];

        public $_thangAm = [
            'tháng Giáp Tý', 'tháng Ất Sửu', 'tháng Bính Dần', 'tháng Đinh Mão', 'tháng Mậu Thìn', 'tháng Kỷ Tỵ',
            'tháng Canh Ngọ', 'tháng Tân Mùi', 'tháng Nhâm Thân', 'tháng Quý Dậu', 'tháng Giáp Tuất', 'tháng Ất Hợi',
            'tháng Bính Tý', 'tháng Đinh Sửu', 'tháng Mậu Dần', 'tháng Kỷ Mão', 'tháng Canh Thìn', 'tháng Tân Tỵ',
            'tháng Nhâm Ngọ', 'tháng Quý Mùi', 'tháng Giáp Thân', 'tháng Ất Dậu', 'tháng Bính Tuất', 'tháng Đinh Hợi',
            'tháng Mậu Tý', 'tháng Kỷ Sửu', 'tháng Canh Dần', 'tháng Tân Mão', 'tháng Nhâm Thìn', 'tháng Quý Tỵ',
            'tháng Giáp Ngọ', 'tháng Ất Mùi', 'tháng Bính Thân', 'tháng Đinh Dậu', 'tháng Mậu Tuất', 'tháng Kỷ Hợi',
            'tháng Canh Tý', 'tháng Tân Sửu','tháng Nhâm Dần', 'tháng Quý Mão', 'tháng Giáp Thìn', 'tháng Ất Tỵ',
            'tháng Bính Ngọ', 'tháng Đinh Mùi', 'tháng Mậu Thân', 'tháng Kỷ Dậu', 'tháng Canh Tuất','tháng Tân Hợi',
            'tháng Nhâm Tý','tháng Quý Sửu','tháng Giáp Dần','tháng Ất Mão','tháng Bính Thìn','tháng Đinh Tỵ',
            'tháng Mậu Ngọ','tháng Kỷ Mùi','tháng Canh Thân','tháng Tân Dậu', 'tháng Nhâm Tuất', 'tháng Quý Hợi',
        ];

        public $_namAm = [
            'năm Giáp Tý', 'năm Ất Sửu', 'năm Bính Dần', 'năm Đinh Mão', 'năm Mậu Thìn', 'năm Kỷ Tỵ',
            'năm Canh Ngọ', 'năm Tân Mùi', 'năm Nhâm Thân', 'năm Quý Dậu', 'năm Giáp Tuất', 'năm Ất Hợi',
            'năm Bính Tý', 'năm Đinh Sửu', 'năm Mậu Dần', 'năm Kỷ Mão', 'năm Canh Thìn', 'năm Tân Tỵ',
            'năm Nhâm Ngọ', 'năm Quý Mùi', 'năm Giáp Thân', 'năm Ất Dậu', 'năm Bính Tuất', 'năm Đinh Hợi',
            'năm Mậu Tý', 'năm Kỷ Sửu', 'năm Canh Dần', 'năm Tân Mão', 'năm Nhâm Thìn', 'năm Quý Tỵ',
            'năm Giáp Ngọ', 'năm Ất Mùi', 'năm Bính Thân', 'năm Đinh Dậu', 'năm Mậu Tuất', 'năm Kỷ Hợi',
            'năm Canh Tý', 'năm Tân Sửu','năm Nhâm Dần', 'năm Quý Mão', 'năm Giáp Thìn', 'năm Ất Tỵ',
            'năm Bính Ngọ', 'năm Đinh Mùi', 'năm Mậu Thân', 'năm Kỷ Dậu', 'năm Canh Tuất','năm Tân Hợi',
            'năm Nhâm Tý','năm Quý Sửu','năm Giáp Dần','năm Ất Mão','năm Bính Thìn','năm Đinh Tỵ',
            'năm Mậu Ngọ','năm Kỷ Mùi','năm Canh Thân','năm Tân Dậu', 'năm Nhâm Tuất', 'năm Quý Hợi',
        ];

        public $_10thienCan = [
            'Giáp', 'Ất', 'Bính', 'Đinh', 'Mậu', 'Kỷ', 'Canh', 'Tân', 'Nhâm', 'Quý',
        ];

        public $_12diachi = [
            'Tý', 'Sửu', 'Dần', 'Mão', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi', 'Thân', 'Dậu', 'Tuất', 'Hợi',
        ];

        function CrawlTarget() {
            // Gọi hàm để lấy ngày, tháng, năm hiện tại
            $date_info = getCurrentDate();

            $url_targets = [
                'https://lichngaytot.com/xem-ngay-tot-xau-'.$date_info['day'].'-'.$date_info['month'].'-'.$date_info['year'],
                'https://lichvannien365.com/xem-ngay-tot-xau-ngay-'.$date_info['day'].'-'.$date_info['month'].'-'.$date_info['year'],
                'http://xemtuong.net/xem_ngay/index.php?al=&day='.$date_info['day'].'&month='.$date_info['month'].'&year='.$date_info['year'],
            ];
            $_regexNgayThang = '/\b\d{1,2}\/\d{1,2}\/\d{4}\b/';
            foreach($url_targets as $url){
                if($url_targets[0]===$url){
                    
                    $xpath = loadDomTarget($url);
                    // xpath ngày dương
                    $_domDuonglich = $xpath->query('//*[@id="LichNgayDetail"]/div[1]/table/tbody/tr[2]');
                    // xpath ngày âm
                    $_domAmlich = $xpath->query('//*[@id="LichNgayDetail"]/div[1]/table/tbody/tr[3]');
                    // xpath Sao tốt Ngọc hạp thông thư
                    $_domSaotot = $xpath->query('//*[@id="LichNgayDetail"]/div[11]/table/tbody/tr[position() >= 2]');

                    // xpath Sao xấu Ngọc hạp thông thư
                    $_domSaoxau = $xpath->query('//*[@id="LichNgayDetail"]/div[12]/table/tbody/tr[position() >= 2]');

                    // xpath Hướng xuất hành
                    $_domHuongxuathanh = $xpath->query('//*[@id="LichNgayDetail"]/div[15]/table/tbody/tr[position() >= 2]');

                    // Tìm ngày dương
                    foreach ($_domDuonglich as $item) {
                        $_duonglich=$item->nodeValue . "\n";
                        if (preg_match_all($_regexNgayThang, $_duonglich, $matches)) {
                            foreach ($matches[0] as $NgayDuong) {
                                echo "2. Mã số ngày dương: " . $NgayDuong . "<br>";//Kết quả ngày dương
                            }
                        } else {
                            echo "Không tìm thấy ngày tháng năm trong chuỗi.";
                        }
                    }

                    // Tìm ngày âm lịch
                    foreach ($_domAmlich as $node) {
                        $_amlich=$node->nodeValue . "\n";
                        if (preg_match_all($_regexNgayThang, $_amlich, $matches)) {
                            foreach ($matches[0] as $NgayAm) {
                                echo "3. Mã số ngày âm: ". $NgayAm . "<br>";//Kết quả ngày âm
                            }
                        } else {
                            echo "Không tìm thấy ngày tháng năm trong chuỗi.";
                        }
                    }

                    // Tìm thứ trong tuần
                    foreach ($_domDuonglich as $item) {
                        $_duonglich=$item->nodeValue . "\n";
                        foreach($this->_thu as $item){
                            if (strpos($_duonglich, $item) !== false) {
                                echo "4. Thứ ngày: " . $item . "<br>";//Kết quả thứ trong tuần
                            }
                        }
                    }
    
                    // Tìm Thiên can và Địa chi ngày
                    foreach ($_domAmlich as $node) {
                        $_amlich=$node->nodeValue . "\n";
                        foreach($this->_ngayAm as $item){
                            if (strpos($_amlich, $item) !== false) {
                                foreach($this->_10thienCan as $thiencanngay){
                                    if (strpos($item, $thiencanngay) !== false){
                                        echo "5. Thiên Can ngày: ". $thiencanngay . "<br>";//Kết quả Thiên can ngày
                                    }
                                }
                                foreach($this->_12diachi as $diachingay){
                                    if (strpos($item, $diachingay) !== false){
                                        echo "6. Địa chi ngày: ". $diachingay . "<br>";//Kết quả Địa chi ngày
                                    }
                                }
                            }
                        }
                    }

                    // Tìm Thiên can và Địa chi tháng
                    foreach ($_domAmlich as $node) {
                        $_amlich=$node->nodeValue . "\n";
                        foreach($this->_thangAm as $item){
                            if (strpos($_amlich, $item) !== false) {
                                foreach($this->_10thienCan as $thiencanthang){
                                    if (strpos($item, $thiencanthang) !== false){
                                        echo "7. Thiên Can tháng: ". $thiencanthang . "<br>";// Kết quả Thiên can tháng
                                    }
                                }
                                foreach($this->_12diachi as $diachithang){
                                    if (strpos($item, $diachithang) !== false){
                                        echo "8. Địa chi tháng: ". $diachithang . "<br>";// Kết quả Địa chi tháng
                                    }
                                }
                            }
                        }
                    }

                    // Tìm Thiên can và Địa chi năm
                    foreach ($_domAmlich as $node) {
                        $_amlich=$node->nodeValue . "\n";
                        foreach($this->_namAm as $item){
                            if (strpos($_amlich, $item) !== false) {
                                foreach($this->_10thienCan as $thiencannam){
                                    if (strpos($item, $thiencannam) !== false){
                                        echo "9. Thiên Can năm: ". $thiencannam . "<br>";// Kết quả Thiên can năm
                                    }
                                }
                                foreach($this->_12diachi as $diachinam){
                                    if (strpos($item, $diachinam) !== false){
                                        echo "10. Địa chi năm: ". $diachinam . "<br>";// Kết quả Địa chi năm
                                    }
                                }
                            }
                        }
                    }

                    // Tìm Sao tốt Ngọc hạp thông thư
                    echo "26. Sao tốt Ngọc hạp thông thư: ";
                    foreach ($_domSaotot as $node) {
                        $_saotot=$node->nodeValue . "\n";

                        $lines = explode("\n", $_saotot);
                        foreach ($lines as $line) {
                            $colon_index = strpos($line, ':');
                            if ($colon_index !== false) {
                                $substring = trim(substr($line, 0, $colon_index));
                                echo $substring . ", ";// Kết quả Sao tốt Ngọc hạp thông thư
                            }
                        }
                    }

                    // Tìm Sao xấu Ngọc hạp thông thư
                    echo "<br> 27. Sao xấu Ngọc hạp thông thư: ";
                    foreach ($_domSaoxau as $node) {
                        $_saoxau=$node->nodeValue . "\n";

                        $lines = explode("\n", $_saoxau);
                        foreach ($lines as $line) {
                            $colon_index = strpos($line, ':');
                            if ($colon_index !== false) {
                                $substring = trim(substr($line, 0, $colon_index));
                                echo $substring . ", ";// Kết quả Sao xấu Ngọc hạp thông thư
                            }
                        }
                    }
                    // echo "<br>";
                    // // Tìm Hướng xuất hành
                    // foreach ($_domHuongxuathanh as $node) {
                    //     $_huongxuathanh=$node->nodeValue . "\n";
                    //     $segments = explode("-", $_huongxuathanh);

                    //     foreach ($segments as $segment) {
                    //         $trimmedSegment = trim($segment);
                    //         if (!empty($trimmedSegment)) {
                    //             echo "- " . $trimmedSegment . "<br>";
                    //         }
                    //     }
                    // }
                }elseif($url_targets[1]===$url){

                    $_nguHanh = ['Hành Thủy', 'Hành Hỏa', 'Hành Thổ', 'Hành Kim', 'Hành Mộc'];
                    $_28chomsao = ['Sao Giác', 'Sao Cang', 'Sao Đê', 'Sao Phòng', 'Sao Tâm', 'Sao Vĩ', 'Sao Cơ', 'Sao Tỉnh', 'Sao Quỷ', 'Sao Liễu', 'Sao Tinh', 'Sao Trương', 'Sao Dực', 'Sao Chẩn', 'Sao Khuê', 'Sao Lâu', 'Sao Vị', 'Sao Mão', 'Sao Tất', 'Sao Chủy', 'Sao Sâm', 'Sao Đẩu', 'Sao Ngưu', 'Sao Nữ', 'Sao Hư', 'Sao Nguy', 'Sao Thất', 'Sao Bích'];
                    $_12truc = ['Trực Kiến', 'Trực Trừ' ,'Trực Mãn' ,'Trực Bình' ,'Trực Định' ,'Trực Chấp' ,'Trực Phá' ,'Trực Nguy' ,'Trực Thành' ,'Trực Thu' ,'Trực Khai' ,'Trực Bế'];
                    $_hoangDaohacDao = [
                        'Ngày Thanh Long Hoàng Đạo',
                        'Ngày Minh Đường Hoàng Đạo',
                        'Ngày Kim Quỹ Hoàng Đạo',
                        'Ngày Kim Đường Hoàng Đạo',
                        'Ngày Ngọc Đường Hoàng Đạo',
                        'Ngày Tư Mệnh Hoàng Đạo',
                        'Ngày Bảo Quang Hoàng Đạo',
                        'Ngày Thiên Hình Hắc Đạo',
                        'Ngày Chu Tước Hắc Đạo',
                        'Ngày Bạch Hổ Hắc Đạo',
                        'Ngày Thiên lao Hắc Đạo',
                        'Ngày Huyền Vũ Hắc Đạo',
                        'Ngày Câu Trận Hắc Đạo',
                    ];
                    $xpath = loadDomTarget($url);
                    // xpath Ngũ hành nạp âm, Trực ngày, Thập nhị bát tú
                    $_domNguhanh = $xpath->query('//*[@id="lvn-page"]/div/div/div/div[1]/div[3]/div[1]/p[2]');
                    // xpath Tiết khí
                    $_domTietkhi = $xpath->query('//*[@id="lvn-page"]/div/div/div/div[1]/div[3]/div[1]/p[3]');
                    // xpath giờ Tốt trong ngày
                    $_domGiotot = $xpath->query('//*[@id="lvn-page"]/div/div/div/div[1]/div[3]/div[4]/div[1]/div[position()>1]/div[1]');
                    
                    // xpath giờ Xấu trong ngày
                    $_domGioxau = $xpath->query('//*[@id="lvn-page"]/div/div/div/div[1]/div[3]/div[4]/div[2]/div[position()>1]/div[1]');

                    // Tìm Ngũ hành nạp âm, Trực ngày, Thập nhị bát tú, Ngày Hoàng Đạo/Hắc Đạo
                    foreach ($_domNguhanh as $node) {
                        $_strContent = $node->nodeValue . "\n";
                        foreach($_nguHanh as $item){
                            if (strpos($_strContent, $item) !== false) {
                                echo "<br>11. Ngũ hành nạp âm: ". $item;// Kết quả Ngũ hành nạp âm
                            }
                        }
                        foreach($_12truc as $item){
                            if (strpos($_strContent, $item) !== false) {
                                echo "<br>18. Trực ngày: ". $item;// Kết quả Trực ngày
                            }
                        }
                        foreach($_28chomsao as $item){
                            if (strpos($_strContent, $item) !== false) {
                                echo "<br>19. Thập nhị bát tú: ". $item;// Kết quả Thập nhị bát tú
                            }
                        }
                        foreach($_hoangDaohacDao as $item){
                            if (strpos($_strContent, $item) !== false) {
                                echo "<br>20. Ngày Hoàng Đạo/Hắc Đạo: ". $item;// Kết quả Ngày Hoàng Đạo/Hắc Đạo
                            }
                        }
                    }
                    
                    // Tìm Tiết khí
                    foreach ($_domTietkhi as $node) {
                        $_saoxau=$node->nodeValue;
                        $substring = strstr($_saoxau, ':');
                        if ($substring !== false) {
                            $result = trim(substr($substring, 1));
                            echo "<br>13. Tiết khí: " . $result; // Kết quả Tiết khí
                        }
                    }

                    // Tìm giờ Tốt trong ngày
                    echo "<br>24. Giờ tốt trong ngày: ";
                    foreach ($_domGiotot as $node) {
                        $_giotot=$node->nodeValue;
                        echo $_giotot . ", ";
                    }

                    // Tìm giờ Xấu trong ngày
                    echo "<br>25. Giờ xấu trong ngày: ";
                    foreach ($_domGioxau as $node) {
                        $_gioxau=$node->nodeValue;
                        echo $_gioxau . ", ";
                    }

                }elseif($url_targets[2]===$url){
                    $xpath = loadDomTarget($url);
                    // xpath các ngày kỵ
                    $_domNgayky = $xpath->query('/html/body/div[1]/div/div[1]/div[6]/table/tbody/tr[3]/td[2]');
                    // Tìm ngày kỵ
                    echo "<br>21. Ngày kỵ: ";
                    foreach ($_domNgayky as $node) {
                        $_ngayky=$node->nodeValue;
                        echo $_ngayky;
                    }
                    
                }
            }
        }
    }
    $target = new Targets();
    $target -> CrawlTarget();
?>