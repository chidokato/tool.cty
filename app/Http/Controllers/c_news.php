<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Image;
use File;
use App\seo;
use App\articles;
use App\category;
use App\images;
use DateTime;
use DatePeriod;
use DateInterval;
use Mail;

class c_news extends Controller
{
    public function getlist()
    {
        $articles = articles::orderBy('id','desc')->get();
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.news.list',[
            'news'=>$articles,
            'category'=>$category,
        ]);
    }

    public function search(Request $Request)
    {
        $datefilter[] = '';
        $articles = articles::where('sort_by',2)->orderBy('id','desc')->where('id','!=' , 0);
        if($Request->key){
            $articles->where('name','like',"%$Request->key%");
        }
        if($Request->category_id){
            $articles->where('category_id',$Request->category_id);
        }
        if(isset($Request->datefilter)){
            $datefilter = explode(" - ", $Request->datefilter);
            $day1 = date('Y-m-d',strtotime($datefilter[0]));
            $day2 = date('Y-m-d',strtotime($datefilter[1]));
            // $articles->whereBetween('created_at', [$day1, $day2]);
            $articles->whereDate('created_at','>=', $day1)->whereDate('created_at','<=', $day2);
        }
        $articles = $articles->paginate($Request->paginate);
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.news.list',[
            'news'=>$articles,
            'category'=>$category,

            'key'=>$Request->key,
            'category_id'=>$Request->category_id,
            'datefilter'=>$Request->datefilter,
            'paginate'=>$Request->paginate,

        ]);
    }

    public function getadd()
    {
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.news.addedit',[
            'category'=>$category
        ]);
    }

    public function postadd(Request $Request)
    {
        // đếm tổng số ngày
        $tongsongay = 0;
        $first_date = strtotime($Request->ngay1);
        $second_date = strtotime($Request->ngay2);
        $datediff = abs($first_date - $second_date);
        $tongsongay = floor($datediff / (60*60*24)); //tổng số ngày
        // đếm tổng số ngày
        // đếm số ngày thư 7 chủ nhật
        $period = new DatePeriod(
            new DateTime($Request->ngay1),
            new DateInterval('P1D'),
            new DateTime($Request->ngay2)
        );
        $thuBay = 0;
        $chuNhat = 0;
        foreach ($period as $key => $value) {
            $timestamp = strtotime($value->format('Y-m-d'));    
            $day = date('l', $timestamp);
            if($day == 'Saturday')
                $thuBay++;
            if($day == 'Sunday')
                $chuNhat++;
        }
        $thuBay = $thuBay/2;  //số ngày thứ 7
        $chuNhat; //số ngày chủ nhật
        $tongsongay = $tongsongay-$thuBay-$chuNhat-$Request->buoi1+$Request->buoi2;
        //if($tongsongay <= 0)
        //  return false;


        $articles = new articles;
        $articles->user_id = Auth::User()->id;
        $articles->category_id = Auth::User()->category->id;
        $articles->ngay1 = date_format(date_create($Request->ngay1),"Y-m-d");
        $articles->buoi1 = $Request->buoi1;
        $articles->ngay2 = date_format(date_create($Request->ngay2),"Y-m-d");
        $articles->buoi2 = $Request->buoi2;
        $articles->name = $Request->hinhthuc;
        $articles->detail = $Request->lydo;
        $articles->songay = $tongsongay;
        $articles->note = 'Nghỉ phép';
        $articles->status = '0';
        $articles->save();

        return redirect('admin/news/list')->with('Alerts','Thành công');
    }

    public function double($id)
    {
        $double = 'double';
        $data = articles::findOrFail($id);
        $seo = seo::findOrFail($data['seo_id']);
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.news.addedit',[
            'data'=>$data,
            'category'=>$category,
            'seo'=>$seo,
            'double'=>$double,
        ]);
    }
    
    public function getedit($id)
    {
        $data = articles::findOrFail($id);
        $seo = seo::findOrFail($data['seo_id']);
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.news.addedit',[
            'data'=>$data,
            'category'=>$category,
            'seo'=>$seo,
        ]);
    }

    public function postedit(Request $Request,$id)
    {
        $articles = articles::find($id);


        
        $articles->save();
        
        return redirect('admin/news/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $articles = articles::find($id);
        
        $seo = seo::find($articles->seo_id);
        $seo->delete();

        // xóa ảnh
        if(File::exists('data/news/'.$articles->img)) {
            File::delete('data/news/'.$articles->img);
            File::delete('data/news/300/'.$articles->img);
            File::delete('data/news/80/'.$articles->img);
        }
        // xóa ảnh
        $articles->delete();
        return redirect('admin/news/list')->with('Alerts','Thành công');
    }

    public function delete_all(Request $Request)
    {
        if (isset($Request->foo)) {
            foreach($Request->foo as $id){
                $articles = articles::find($id);
                // xóa ảnh
                if(File::exists('data/news/'.$articles->img)) {
                    File::delete('data/news/'.$articles->img);
                    File::delete('data/news/300/'.$articles->img);
                    File::delete('data/news/80/'.$articles->img);
                }
                // xóa ảnh
                $articles->delete();
            }
        }
        return redirect('admin/news/list')->with('Success','Success');
    }


    public function addflast(Request $Request)
    {
        include 'admin_asset/simplehtml/simple_html_dom.php';
        $html = file_get_html($Request->link);
        
        $thuoctinh =  $html->find('.entry-body',0)->find('.boxtip');
        foreach ($thuoctinh as $key => $value) {
            $value->outertext=''; // xóa class boxtip bên trong class entry-body
        }
        $thuoctinh =  $html->find('.entry-body',0)->find('.banner');
        foreach ($thuoctinh as $key => $value) {
            $value->outertext=''; // xóa
        }
        $thuoctinh =  $html->find('.entry-body',0)->find('.shareImage');
        foreach ($thuoctinh as $key => $value) {
            $value->outertext=''; // xóa
        }
        $thuoctinh =  $html->find('.entry-body',0)->find('.alignRight');
        foreach ($thuoctinh as $key => $value) {
            $value->outertext=''; // xóa
        }
        $thuoctinh =  $html->find('.entry-body',0)->find('.type-7_preview');
        foreach ($thuoctinh as $key => $value) {
            $value->outertext=''; // xóa
        }


        function get_firstimage( $contents ){
            if( preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $contents, $img) ){
                return $img[1];
            }else{
                return '';
            }
        } // ảnh trong bài viết

        // echo $name = $html->find('.dt-title',0)->plaintext."<br>"; // tiêu đề
        // echo '<img style="width: 200px;" src="'.get_firstimage($html->find('img',6)).'">'."<br>";  // ảnh đại diện
        // echo $content = $html->find('.entry-body',0); // content

        
        // $this->validate($Request,['name' => 'Required'],[] );
        // seo
        $seo = new seo;
        $seo->title = $html->find('.dt-title',0)->plaintext;
        $seo->description = $html->find('.dt-title',0)->plaintext;
        // $seo->keywords = $Request->keywords;
        // $seo->robot = $Request->robot;
        $seo->save();

        $articles = new articles;
        $articles->user_id = Auth::User()->id;
        $articles->category_id = $Request->cat_id;
        $articles->seo_id = $seo->id;
        $articles->sort_by = '2';
        $articles->sku = str_random(8);
        $articles->name = $html->find('.dt-title',0)->plaintext;
        $articles->slug = changeTitle($html->find('.dt-title',0)->plaintext);
        $articles->detail = $html->find('.dt-title',0)->plaintext;
        $articles->content = $html->find('.entry-body',0);
        $articles->hits = '50';
        $articles->status = 'true';
        $articles->img2 = get_firstimage($html->find('img',6));
        
        $articles->save();
        
        return redirect('admin/news/list')->with('Alerts','Thành công');
    }
}
