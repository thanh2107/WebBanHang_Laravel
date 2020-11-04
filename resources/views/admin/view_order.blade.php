
@extends('admin_layout')
@section('admin_content')
<div id="invoice">
    <?php
        $message = Session::get('message');
        if($message){

          echo '<span class="alert alert-danger errorI">'.$message.'</span>';
          Session::put('message',null);
        }
        ?>
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button value="click" onclick="printDiv()" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
            <a href="{{route('manage-orders')}}"><button  class="btn btn-info"><i class="fa fa-backward"></i> Quay lại</button></a>
            <a href="{{route('confirm-order',$order_id)}}"><button  class="btn btn-danger"><i class="fa fa-check"></i> Xác nhận đơn hàng</button></a>
        </div>
        <hr>
    </div>

    <div id="GFG" class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img  src="{{asset('resources/img/logo12.png')}}" style="width:100%; max-width:130px;" alt="">
                            </td>
                             <td></td>
                            <td>
                                Hoá đơn #: {{$order_id}}<br>
                                Thời gian: {{$order->created_at}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                           <td >
                               Tên: {{$order->user->name}}<br>
                                SĐT: {{$order->user->phone}}<br>
                                Email: {{$order->user->email}}
                            
                            </td>
                            <td></td>
                            <td></td>
                       
                            <td>Địa chỉ :{{$order->user->address}}
                              
                               </td>
                            
                                 <td    style="position: absolute;" > Ghi chú :{{$order->ghi_chu}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                   Phương thức thanh toán
                </td>
                <td></td>
                <td><td>
                <td></td>  
                <td></td>
                 <td></td>
            </tr>
            
            <tr class="details">
                <td>
                    Thanh toán khi nhận hàng
                </td>
                <td></td>
                <td></td>
                <td></td>
                 <td></td>
                <td>
                    {{$order->thanh_toan}}
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Sản phẩm
                </td>
                <td>
                    Màu 
                </td>
                <td>
                    Size 
                </td>
                <td>
                    Số lượng 
                </td>
                <td>
                    Giá 
                </td>
                 <td>
                  Thành tiền 
                </td>
            </tr>
            
      
              @foreach($detail_order as $details)
             <tr class="item">
              <td>{{$details->chi_tiet_sp->san_pham->ten_san_pham}}</td>
              <td>{{$details->chi_tiet_sp->mau_sp->mau}}</td>
              <td>{{$details->chi_tiet_sp->size_sp->ten_size}}</td>
              <td>{{$details->so_luong}}</td>
              <td>{{number_format($details->don_gia)}}₫</td>
              <td>{{ number_format($details->so_luong*$details->don_gia)}}₫</td>
                </tr>
              @endforeach
               
            
            
            
            <tr class="item last">
                <td>
                   Ship
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    @if(($details->so_luong*$details->don_gia<$order->tong_tien))
                      {{number_format(20000)}}₫
                    @else
                      FreeShip
                    @endif
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                 <td></td>
                  <td></td>
                   <td></td>  
                    
                
                <td style="position: absolute;">
                   Tổng tiền: {{number_format($order->tong_tien)}}₫
                </td>
            </tr>
        </table>
    </div>
</div>
 <script> 
        function printDiv() { 
            var divContents = document.getElementById("GFG").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body > <h1>Div contents are <br>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script>
@endsection