<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .wrapper {
            font-family: "Times New Roman", Times, serif;
            font-size:15px;
            padding: 0;
        }
        p {

            /*margin-bottom:10.0pt;*/
            /*margin-left:36.0pt;*/
        }
    </style>
</head>
<body>
<div class="wrapper" style="padding: 0px">
    <p style='margin-bottom:10.0pt;text-align:center;'><strong ><span >CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</span></strong></p>
    <p style='margin-bottom:10.0pt;text-align:center;'><strong ><span >Độc Lập - Tự Do - Hạnh Phúc</span></strong></p>
    <p style='margin-bottom:10.0pt;'>&nbsp;</p>
    <h2 style='font-size:24px;font-weight:bold;text-align:center;'><strong ><span style="font-size:16px;color:black;">HỢP ĐỒNG THUÊ XE</span></strong></h2>
    <p style='margin-bottom:10.0pt;'>&nbsp;</p>
    <p style='margin-bottom:10.0pt;text-align:center;'><span >Số: {{ $contract->code }}</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >&nbsp;</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; <em>Căn cứ Bộ Luật Dân sự số 33/2005/QH 11 đã được Quốc Hội nước Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam khóa XI, kỳ họp thứ 7 thông qua ngày 14/06/2005;</em></span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; <em>Căn cứ luật thương mại số 36/2005/QH 11 đã được Quốc Hội nước Cộng Hoà Xã Hội Chủ Nghĩa Việt Nam khóa XI, kỳ họp thứ 7 thông qua ngày 14/06/2005;</em></span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; <em>Căn cứ vào nhu cầu và khả năng cung ứng của các bên dưới đây.</em></span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >Hôm nay, {{ $contract->dateCreateText }}, chúng tôi gồm :</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><strong ><u><span >BÊN A:</span></u> </strong><span >(Bên thuê)</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Đại diện:{{ $contract->customerOrder->name }}</span ></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Số điện thoại: {{ $contract->customerOrder->phone }}</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Địa chỉ: {{ $contract->customerOrder->address }}</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><strong ><u><span >BÊN B:</span></u> </strong><strong ><span >(Bên cho thuê)</span></strong></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Đại diện: Phạm Kim Cúc</span ></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Địa chỉ: Công ty TNHH BookingCar</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >Sau khi bàn bạc, thỏa thuận, hai bên thống nhất ký kết Hợp đồng thuê xe với các điều khoản như sau:</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><strong ><span >ĐIỀU 1 : NỘI DUNG HỢP ĐỒNG</span></strong></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >Bên A đồng ý thuê của bên B thuê một xe ô tô.</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >+ Xe {{ $contract->productOrder->name }} sản xuất năm {{ $contract->productOrder->textYear }}, biển số kiểm soát {{ $contract->productOrder->license_plates }}</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><strong ><span >ĐIỀU 2 : GIÁ TRỊ HỢP ĐỒNG, PHƯƠNG THỨC THANH TOÁN:</span></strong></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >- Giá thuê xe là       : {{ number_format($contract->price_hour) }} đồng/giờ</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >- Giá trị hợp đồng     : {{ number_format($contract->price_total) }} VNĐ</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >( Giá trên đã bao gồm thuế GTGT )</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >- Tiền đã cọc     : {{ number_format($contract->price_deposits) }} VNĐ</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><strong ><span >ĐIỀU 3 : TRÁCH NHIỆM CỦA CÁC BÊN</span></strong></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><em><strong ><span >3.1. Trách nhiệm của bên B:</span></strong></em></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Giao xe và toàn bộ giấy tờ liên quan đến xe ngay sau khi Hợp đồng có hiệu lực và Bên A đã thanh toán tiền thuê xe 01 tháng đầu tiên. Giấy tờ liên quan đến xe gồm: Giấy đăng ký xe, giấy kiểm định, giấy bảo hiểm xe.</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Chịu trách nhiệm pháp lý về nguồn gốc và quyền sở hữu của xe.</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Mua bảo hiểm xe và đăng kiểm xe cho các lần kế tiếp trong thời hạn hiệu lực của Hợp đồng.</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Xuất hóa đơn thuê xe</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><em><strong ><span >3.2. Trách nhiệm, quyền hạn của bên A</span></strong></em></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Thanh toán tiền đầy đủ thuê xe cho Bên B đúng hạn.</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Chịu toàn bộ chi phí bảo dưỡng, sửa chữa xe khi có sự cố</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Chịu toàn bộ chi phí xăng dầu khi sử dụng xe.</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><strong ><span >ĐIỀU 4 : HIỆU LỰC HỢP ĐỒNG</span></strong></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Hợp đồng có giá trị kể từ {{ $contract->pickDateText }} đến hết ngày {{ $contract->dropDateText }}</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp;  Nếu quá hạn trả xe, Bên A phải chịu thêm phí tương đương với {{ number_format($contract->productOrder->overtime_price) }} VNĐ/giờ</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp;  Nếu một trong hai Bên, bên nào muốn chấm dứt Hợp đồng trước thời hạn thì phải thông báo cho Bên kia và chịu trách nghiệm hoàn toàn với giá trị hợp đồng.</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><strong ><span >ĐIỀU 5 : ĐIỀU KHOẢN CHUNG</span></strong></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Trong quá trình thực hiện hợp đồng, nếu có đề nghị điều chỉnh thì phải thông báo cho nhau bằng văn bản để cùng bàn bạc giải quyết.</span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp;  Hai bên cam kết thi hành đúng các điều khoản của hợp đồng, không bên nào tự ý đơn phương sửa đổi, đình chỉ hoặc hủy bỏ hợp đồng. Mọi sự vi phạm phải được xử lý theo pháp luật. </span></p>
    <p style='margin-left:36.0pt;margin-bottom:10.0pt;text-align:justify;'><span >- &nbsp; &nbsp; &nbsp; &nbsp; Hợp đồng này có hiệu lực từ ngày ký và coi như được thanh lý sau khi hai bên thực hiện xong nghĩa vụ của mình và không còn bất kỳ khiếu nại nào.</span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hợp đồng được lập thành 02 (bốn) bản có giá trị pháp lý như nhau, Bên A giữ 01 bản. Bên B giữ 01 bản.</span></p>
    <p style='margin-bottom:10.0pt;text-align:center;'><span >&nbsp;<strong >ĐẠI DIỆN BÊN A  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ĐẠI DIỆN BÊN B</strong></span></p>
    <p style='margin-bottom:10.0pt;text-align:justify;'><span >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>
    <p style='margin-bottom:10.0pt;'><span style="font-size:16px;">&nbsp;</span></p>
    <p style='margin-bottom:10.0pt;'><span style="font-size:16px;">&nbsp;</span></p>
    <p style='margin-bottom:10.0pt;'><span style="font-size:16px;">&nbsp;</span></p>
    <p style='margin-bottom:10.0pt;'><span style="font-size:16px;">&nbsp;</span></p>
</div>
</body>
</html>
