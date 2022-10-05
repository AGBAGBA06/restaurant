<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallerie;
use App\Models\Aboutt;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //Gestion de la fonctionnalite gallerie
    public function ajoutergallerie()
    {
        return view('admin.ajoutergallerie');
    }
    //pour acceder a la page gallerie
    public function galleries(){
        $galleries = gallerie::get();
        return view('admin.galleries')->with('galleries', $galleries);
    }
    //pour l'ajout
    public function sauvergallerie(Request $request){
        $this->validate($request, [
                                   //'prix'=>'required',
                                  // 'gallerie_category'=>'required',
                                   //'status'=>'required',
                                   'gallerie_image'=>'image|nullable|max:1999']);

                                   if($request->hasFile('gallerie_image')){
                                      //1-select image with extension
                                      $fileNameWithExt=$request->file('gallerie_image')->getClientOriginalName();
                                      //2-get just file name
                                      $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                                      //3-get just extension
                                       $extension = $request->file('gallerie_image')->getClientOriginalExtension();
                                      //4-file name store
                                      $fileNametostore=$fileName.'_'.time().'.'.$extension;
                                      //uplaoder l'image
                                      $path=$request->file('gallerie_image')->storeAs('public/gallerie_images',
                                                 $fileNametostore);
                                   }
                                   else{
                                       
                                       $fileNametostore='noimage.jpg';
                                   }
                                   $gallerie=new Gallerie();
                                   // $gallerie->mot_de_passe=$request->input('mot_de_passe');
                                   // $gallerie->email=$request->input('email');
                                   
                                   // $product->gallerie_category=$request->input('gallerie_category');
                                   $gallerie->gallerie_image=$fileNametostore;
                                   $gallerie->save();
                                   return redirect('/ajoutergallerie')->with('status','le  gallerie   a ete bien ajoute');
                                
                               }
   
    //pour editer
    public function editgallerie($id){
       $product= Product::find($id);
      ///$gallerie=Product::All()->pluck('nom','nom');
      //$categories=Category::All()->pluck('category_name','category_name');


       return view ('admin.editgallerie')->with('product',$product);

       
        }
        
        public function modifiergallerie(Request $request){
           $this->validate($request, ['nom'=>'required',
                                     'prix'=>'required',
                                   'gallerie_category'=>'required',
                                   'gallerie_image'=>'image|nullable|max:1999']);
                                       
           $gallerie= Product::find($request->input('id'));
           $gallerie->nom=$request->input('nom');
           $gallerie->prix=$request->input('prix');
           $gallerie->gallerie_category=$request->input('gallerie_category');
           
           if($request->hasFile('gallerie_image')){
               //1-select image with extension
               $fileNameWithExt=$request->file('gallerie_image')->getClientOriginalName();
               //2-get just file name
               $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
               //3-get just extension
                $extension = $request->file('gallerie_image')->getClientOriginalExtension();
               //4-file name store
               $fileNametostore=$fileName.'_'.time().'.'.$extension;
               //uplaoder l'image
               $path=$request->file('gallerie_image')->storeAs('public/gallerie_images',
                          $fileNametostore);

                          if ($gallerie->gallerie_image!='noimage.jpg') {
                           //Storage::delete('public/gallerie_images/'.$gallerie->image);
                          
                          }
                          $gallerie->gallerie_image=$fileNametostore;
            }


           $gallerie->update();
           return redirect('/products')->with('status',
         'le gallerie '.$gallerie->nom.' a ete bien modifier');
        }



    //pour la suppression
    public function deletegallerie($id)
    {
        $gallerie = gallerie::find($id);
        $gallerie->delete();
        return redirect('/galleries')->with(
            'status',
            'la gallerie a ete bien supprimer'
        );
    }


    //88888888888888888888 Gestion de la fonctionnalite about8888888888888888888888888888888888888888888888888
    public function ajouterabout()
    {
        return view('admin.ajouterabout');
    }
    //pour acceder a la page about
    public function abouts(){
        $abouts = Aboutt::get();
        return view('admin.abouts')->with('abouts', $abouts);
    }
    //pour l'ajout
    public function sauverabout(Request $request){
        $this->validate($request, ['texte'=>'required',
                                   //'status'=>'required',
                                   'about_image'=>'image|nullable|max:1999']);

                                   if($request->hasFile('about_image')){
                                      //1-select image with extension
                                      $fileNameWithExt=$request->file('about_image')->getClientOriginalName();
                                      //2-get just file name
                                      $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                                      //3-get just extension
                                       $extension = $request->file('about_image')->getClientOriginalExtension();
                                      //4-file name store
                                      $fileNametostore=$fileName.'_'.time().'.'.$extension;
                                      //uplaoder l'image
                                      $path=$request->file('about_image')->storeAs('public/about_images',
                                                 $fileNametostore);
                                   }
                                   else{
                                       
                                       $fileNametostore='noimage.jpg';
                                   }
                                   $about=new Aboutt();
                                   $about->texte=$request->input('texte');
                                   $about->about_image=$fileNametostore;
                                   //$about->status=1;
                                   $about->save();
                                   return redirect('/ajouterabout')->with('status','le  about   a ete bien ajoute');
                                
                               }
   
    //pour editer
    //  public function editabout($id){
    //    $about= Aboutt::find($id);
    //   $about=Aboutt::All()->pluck('texte','texte');
    //    return view ('admin.editabout')->with('about',$about);

       
    //     }
        
        // public function modifierabout(Request $request){
        //    $this->validate($request, ['texte'=>'required',
        //                               'about_image'=>'image|nullable|max:1999']);
                                       
        //    $about= Aboutt::find($request->input('id'));
        //    $about->texte=$request->input('texte');
        //    $about->about_image=$request->input('about_image');
           
        //    if($request->hasFile('about_image')){
        //        //1-select image with extension
        //        $fileNameWithExt=$request->file('about_image')->getClientOriginalName();
        //        //2-get just file name
        //        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //        //3-get just extension
        //         $extension = $request->file('about_image')->getClientOriginalExtension();
        //        //4-file name store
        //        $fileNametostore=$fileName.'_'.time().'.'.$extension;
        //        //uplaoder l'image
        //        $path=$request->file('about_image')->storeAs('public/about_images',
        //                   $fileNametostore);

        //                   if ($about->about_image!='noimage.jpg') {
        //                    //Storage::delete('public/about_images/'.$about->about_image);
        //                   }
        //                   $about->about_image=$fileNametostore;
        //     }


        //    $about->update();
        //    return redirect('/abouts')->with('status',
        //  'le bout  a ete bien modifier');
        // }

    //pour la suppression
    public function deleteabout($id)
    {
        $about = Aboutt::find($id);
        $about->delete();
        return redirect('/abouts')->with(
            'status',
            'la about a ete bien supprimer'
        );
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
