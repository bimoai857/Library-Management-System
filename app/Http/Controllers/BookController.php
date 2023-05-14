<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Book;
use App\Models\Book_detail;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BookController extends Controller
{
    //
    public function bookInfo(){
        $user=User::where('username',session('sessionStatus'))->first();
        $issueInfo=User::find($user->id)->issue;
        if($issueInfo->count()==0){
            return view('user.borrowed',['issueInfo'=>$issueInfo,'bookInfo'=>[],'user'=>$user]);
     
        }
        for($i=0;$i<count($issueInfo);$i++){
            $bookInfo[$i]=$issueInfo[$i]->book;
        }
        return view('user.borrowed',['issueInfo'=>$issueInfo,'bookInfo'=>$bookInfo,'user'=>$user]);
    }
    public function bookInfoAdmin($id){
        $user=User::where('id',$id)->first();
        $issueInfo=User::find($user->id)->issue;
        for($i=0;$i<count($issueInfo);$i++){
            $bookInfo[$i]=$issueInfo[$i]->book;
        }
        return view('user.borrowed',['issueInfo'=>$issueInfo,'bookInfo'=>$bookInfo,'user'=>$user]);
    }
    public function libraryInfo(Request $request){

        $books=Book::query();
        $filtered=false;
        if($request->input('query')){
            $books=$books->where('title', 'like', '%' . $request->input('query') . '%');
            $filtered=true;
        }
        
        $books=$books->get();
        $admin=User::where('username',session('sessionStatus'))->first()['admin'];
        if(count($books)==0){
            return view('libraryInfo',['count'=>0,'admin'=>$admin,'bookInfo'=>[],'filtered'=>$filtered]);
        }
        else{
            for($i=0;$i<count($books);$i++){
                $x[$i]=$books[$i]->book_detail;
            }
            for($i=0;$i<count($x);$i++){
                $total[$i]=count($x[$i]);
            }
            for($i=0;$i<count($books);$i++){
                $y[$i]=$books[$i]->issue;
            }
            for($i=0;$i<count($y);$i++){
                $used[$i]=count($y[$i]);
            }
            for($i=0;$i<count($total);$i++){
                $available[$i]=$total[$i]-$used[$i];
    
            }
            return view('libraryInfo',['bookInfo'=>$books,'available'=>$available,'filtered'=>$filtered,'count'=>1,'admin'=>$admin]);        }
      
    }
    public function addBook(Request $request){
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'genre'=>'required'
        ]);
        
        $title_author=Book::where('title',$request->title)
                    ->where('author',$request->author)->get();
        
        if(count($title_author)==0){
        $book=new Book;
        $book->author=strtoupper($request->author);
        $book->title=strtoupper($request->title);
        $book->genre=$request->genre;
        $book->save();
        $bookDetail=new Book_detail;
        $bookDetail->id=$book->id;
        $bookDetail->book_id=Str::random(5);
        session()->flash('bookId',$bookDetail->book_id);
        $bookDetail->save();
        }
        else{
            $id=Book::where('title',strtoupper($request->title))
            ->where('author',strtoupper($request->author))->first()->id;
            $book=new Book_detail;
            $book->id=$id;
            $book->book_id=Str::random(5);
            session()->flash('bookId',$book->book_id);
            $book->save();
        }
       return back();
    }
    public function addBorrower(Request $request){
        $request->validate([
            'email'=>'required',
            'bid'=>'required',
            'dos'=>'required'
        ]);

        date_default_timezone_set('Asia/Kathmandu');
        $user_id=User::where('email',$request->email)->first()->id;
        $book_id=$request->bid;
        $type_id=Book_detail::where('book_id',$book_id)->first()->id;
        $issue=new Issue;
        $issue->type_id=$type_id;
        $issue->book_id=$book_id;
        $issue->user_id=$user_id;
        $issue->date=date('Y-m-d H:i:s');
        $issue->date_submission=$request->dos;
        $issue->save();
        session()->flash('addBorrower','New Borrower has been added!');
        return redirect('borrowers');
        
    }
}
