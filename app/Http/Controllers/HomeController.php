<?php

namespace App\Http\Controllers;
use Illuminate\Http\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Gallerie;
use App\Models\Aboutt;
use App\Models\Event;
use App\Models\Chef;
use App\Models\Specials;


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

    //11111111111111111111111111111111111111111111 Gestion de la fonctionnalite gallerie
    public function ajoutergallerie()
    {
        return view('admin.ajoutergallerie');
    }
    //pour acceder a la page gallerie
    public function galleries(){
        $galleries =Gallerie::get();
        return view('admin.galleries')->with('galleries', $galleries);
    }
    //pour l'ajout
    public function sauvergallerie(Request $request){
                $this->validate($request,['status'=>'required',
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
                $path=$request->file('gallerie_image')->storeAs('public/gallerie_images',$fileNametostore);
                            
                }
                else{
                    $fileNametostore='noimage.jpg';
                }
                $gallerie=new Gallerie();
                $gallerie->gallerie_image=$fileNametostore;
                $gallerie->status=1;
                $gallerie->save();
                return redirect('/ajoutergallerie')->with('status','le  gallerie  a ete bien ajoute');  
                                
            }
   
    //pour la suppression
    public function deletegallerie($id)
    {
        $gallerie = gallerie::find($id);
        $gallerie->delete();
        return redirect('/galleries')->with(
            'status','la gallerie a ete bien supprimer'
        );
    }

    public function activer_gallerie($id){
        $gallerie= Gallerie::find($id);
        $gallerie->status=1;
            $gallerie->update();
            return redirect('/galleries')->with('status',
            'le gallerie a ete bien desactiver');
            
            //pour desactiver un produit
        }
         public function desactiver_gallerie($id){
            $gallerie= Gallerie::find($id);
            $gallerie->status=0;
            $gallerie->update();
            return redirect('/galleries')->with('status',
            'la photo a ete bien active');
    }


    //2222222222222222222222222222222222222222222  Gestion de la fonctionnalite about 2222222222222222222222228
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

    //3333333333333333333333333  GESTION DES EVENEMENTS 333333333333333333333333333333333333333333

    public function events(){
        $events= event::get();
        return view('admin.events')->with('events', $events);
    }




    public function ajouterevent(){
        return view('admin.ajouterevent');
    }

    //pour l'ajout
    public function sauverevent(Request $request){
         $this->validate($request, ['titre'=>'required|unique:events',
                                    'prix'=>'required',
                                    'texte'=>'required',
                                    'status'=>'required',
                                    'event_image'=>'image|nullable|max:1999']);

                                    if($request->hasFile('event_image')){
                                       //1-select image with extension
                                       $fileNameWithExt=$request->file('event_image')->getClientOriginalName();
                                       //2-get just file name
                                       $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                                       //3-get just extension
                                        $extension = $request->file('event_image')->getClientOriginalExtension();
                                       //4-file name store
                                       $fileNametostore=$fileName.'_'.time().'.'.$extension;
                                       //uplaoder l'image
                                       $path=$request->file('event_image')->storeAs('public/event_images',
                                                  $fileNametostore);
                                    }
                                    else{
                                        
                                        $fileNametostore='noimage.jpg';
                                    }
                                    $event=new event();
                                    $event->titre=$request->input('titre');
                                    $event->prix=$request->input('prix');
                                    $event->texte=$request->input('texte');
                                    $event->event_image=$fileNametostore;
                                    $event->status=1;
                                    $event->save();
                                    return redirect('/ajouterevent')->with('status','le  event  '
                                                       .$event->titre.'  a ete bien ajoute');
                                 
                                }
    
     //pour editer
     public function editevent($id){
        $event= event::find($id);
       $event=event::All()->pluck('titre','titre');
        return view ('admin.editevent')->with('event',$event);

        
         }
         
         public function modifierevent(Request $request){
            $this->validate($request, ['titre'=>'required',
                                      'prix'=>'required',
                                      'texte'=>'required',
                                    'status'=>'required',
                                    'event_image'=>'image|nullable|max:1999']);
                                        
            $event= event::find($request->input('id'));
            $event->titre=$request->input('titre');
            $event->texte=$request->input('texte');
            $event->prix=$request->input('prix');
            $event->status=1;
            
            if($request->hasFile('event_image')){
                //1-select image with extension
                $fileNameWithExt=$request->file('event_image')->getClientOriginalName();
                //2-get just file name
                $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //3-get just extension
                 $extension = $request->file('event_image')->getClientOriginalExtension();
                //4-file name store
                $fileNametostore=$fileName.'_'.time().'.'.$extension;
                //uplaoder l'image
                $path=$request->file('event_image')->storeAs('public/event_images',
                           $fileNametostore);

                           if ($event->event_image!='noimage.jpg') {
                            //Storage::delete('public/event_images/'.$event->image);
                           
                           }
                           $event->event_image=$fileNametostore;
             }


            $event->update();
            return redirect('/events')->with('status',
          'le event '.$event->titre.' a ete bien modifier');
         }



         public function deleteevent($id)    {
        $event = event::find($id);
        $event->delete();
        return redirect('/events')->with(
            'status',
            'la event' . $event->titre. 'a ete bien supprimer'
        );
    }
    
        //pour activer un event
 public function activer_event($id){
    $event= event::find($id);
    $event->status=1;
        $event->update();
        return redirect('/events')->with('status',
        'le event '.$event->titre.' a ete bien desactiver');
        
        //pour desactiver un event
    }
     public function desactiver_event($id){
        $event= event::find($id);
        $event->status=0;
        $event->update();
        return redirect('/events')->with('status',
        'la event '.$event->titre.' a ete bien active');
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

    //4444444444444444444444444   GESTION DES CHEFS   44444444444444444444444444444444444444444444444444


    public function chefs(){
        $chefs= chef::get();
        return view('admin.chefs')->with('chefs', $chefs);
    }




    public function ajouterchef(){
        return view('admin.ajouterchef');
    }

    //pour l'ajout
    public function sauverchef(Request $request){
         $this->validate($request, ['nom_chef'=>'required|unique:chefs',
                                    'fonction'=>'required',
                                    'status'=>'required',
                                    'chef_image'=>'image|nullable|max:1999']);

                                    if($request->hasFile('chef_image')){
                                       //1-select image with extension
                                       $fileNameWithExt=$request->file('chef_image')->getClientOriginalName();
                                       //2-get just file name
                                       $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                                       //3-get just extension
                                        $extension = $request->file('chef_image')->getClientOriginalExtension();
                                       //4-file name store
                                       $fileNametostore=$fileName.'_'.time().'.'.$extension;
                                       //uplaoder l'image
                                       $path=$request->file('chef_image')->storeAs('public/chef_images',
                                                  $fileNametostore);
                                    }
                                    else{
                                        
                                        $fileNametostore='noimage.jpg';
                                    }
                                    $chef=new chef();
                                    $chef->nom_chef=$request->input('nom_chef');
                                    $chef->fonction=$request->input('fonction');
                                    $chef->chef_image=$fileNametostore;
                                    $chef->status=1;
                                    $chef->save();
                                    return redirect('/ajouterchef')->with('status','le  chef  '
                                                       .$chef->nom_chef.'  a ete bien ajoute');
                                 
                                }
    
     //pour editer
     public function editchef($id){
        $chef=chef::find($id);
       $chef=chef::All()->pluck('nom_chef','nom_chef');
        return view ('admin.editchef')->with('chef',$chef);

        
         }
         
         public function modifierchef(Request $request){
            $this->validate($request, ['nom_chef'=>'required',
                                      'fonction'=>'required',
                                      'texte'=>'required',
                                      'status'=>'required',
                                      'chef_image'=>'image|nullable|max:1999']);
                                        
            $chef= chef::find($request->input('id'));
            $chef->nom_chef=$request->input('nom_chef');
            $chef->fonction=$request->input('fonction');
            $chef->texte=$request->input('texte');
            $chef->status=1;
            
            if($request->hasFile('chef_image')){
                //1-select image with extension
                $fileNameWithExt=$request->file('chef_image')->getClientOriginalName();
                //2-get just file name
                $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //3-get just extension
                 $extension = $request->file('chef_image')->getClientOriginalExtension();
                //4-file name store
                $fileNametostore=$fileName.'_'.time().'.'.$extension;
                //uplaoder l'image
                $path=$request->file('chef_image')->storeAs('public/chef_images',
                           $fileNametostore);

                           if ($chef->chef_image!='noimage.jpg') {
                            //Storage::delete('public/chef_images/'.$chef->image);
                           
                           }
                           $chef->chef_image=$fileNametostore;
             }


            $chef->update();
            return redirect('/chefs')->with('status',
          'le chef '.$chef->nom_chef.' a ete bien modifier');
         }



         public function deletechef($id)    {
        $chef = chef::find($id);
        $chef->delete();
        return redirect('/chefs')->with(
            'status',
            'la chef' . $chef->nom_chef. 'a ete bien supprimer'
        );
    }
    
        //pour activer un chef
 public function activer_chef($id){
    $chef= chef::find($id);
    $chef->status=1;
        $chef->update();
        return redirect('/chefs')->with('status',
        'le chef '.$chef->nom_chef.' a ete bien desactiver');
        
        //pour desactiver un chef
    }
     public function desactiver_chef($id){
        $chef= chef::find($id);
        $chef->status=0;
        $chef->update();
        return redirect('/chefs')->with('status',
        'la chef '.$chef->nom_chef.' a ete bien active');
}



//555555555555555555555 GESTION DES SPEICIALS 555555555555555555555555555555555555555555555555
public function specials(){
    $specials= specials::get();
    return view('admin.specials')->with('specials', $specials);
}




public function ajouterspecial(){
    return view('admin.ajouterspecial');
}

//pour l'ajout
public function sauverspecial(Request $request){
     $this->validate($request, ['titre'=>'required|unique:specials',
                                'nom_special'=>'required',
                                'description'=>'required',
                                'status'=>'required',
                                'special_image'=>'image|nullable|max:1999']);
                                
                                if($request->hasFile('special_image')){
                                   //1-select image with extension
                                   $fileNameWithExt=$request->file('special_image')->getClientOriginalName();
                                   //2-get just file name
                                   $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                                   //3-get just extension
                                    $extension = $request->file('special_image')->getClientOriginalExtension();
                                   //4-file name store
                                   $fileNametostore=$fileName.'_'.time().'.'.$extension;
                                   //uplaoder l'image
                                   $path=$request->file('special_image')->storeAs('public/special_images',
                                              $fileNametostore);
                                }
                                else{
                                    $fileNametostore='noimage.jpg';
                                }
                                $special=new specials();
                                $special->titre=$request->input('titre');
                                $special->nom_special=$request->input('nom_special');
                                $special->description=$request->input('description');
                                $special->special_image=$fileNametostore;
                                $special->status=1;
                                $special->save();
                                return redirect('/ajouterspecial')->with('status','le  special  '
                                                   .$special->nom_special.'  a ete bien ajoute');
                             
                            }

 //pour editer
 public function editspecial($id){
    $special= specials::find($id);
   $special=specials::All()->pluck('nom_special','nom_special');
    return view ('admin.editspecial')->with('special',$special);

    
     }
     
     public function modifierspecial(Request $request){
        $this->validate($request, ['titre'=>'required',
                                  'prix'=>'required',
                                  'texte'=>'required',
                                'status'=>'required',
                                'special_image'=>'image|nullable|max:1999']);
                                    
        $special= specials::find($request->input('id'));
        $special->titre=$request->input('titre');
        $special->description=$request->input('description');
        $special->nom_special=$request->input('nom_special');
        $special->status=1;
        
        if($request->hasFile('special_image')){
            //1-select image with extension
            $fileNameWithExt=$request->file('special_image')->getClientOriginalName();
            //2-get just file name
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //3-get just extension
             $extension = $request->file('special_image')->getClientOriginalExtension();
            //4-file name store
            $fileNametostore=$fileName.'_'.time().'.'.$extension;
            //uplaoder l'image
            $path=$request->file('special_image')->storeAs('public/special_images',
                       $fileNametostore);

                       if ($special->special_image!='noimage.jpg') {
                        //Storage::delete('public/special_images/'.$special->image);
                       
                       }
                       $special->special_image=$fileNametostore;
         }


        $special->update();
        return redirect('/specials')->with('status',
      'le special '.$special->nom_special.' a ete bien modifier');
     }



     public function deletespecial($id)    {
    $special = specials::find($id);
    $special->delete();
    return redirect('/specials')->with(
        'status',
        'la special' . $special->nom_special. 'a ete bien supprimer'
    );
}

    //pour activer un special
public function activer_special($id){
$special= Specials::find($id);
$special->status=1;
    $special->update();
    return redirect('/specials')->with('status',
    'le special '.$special->nom_special.' a ete bien desactiver');
    
    //pour desactiver un special
}
 public function desactiver_special($id){
    $special= specials::find($id);
    $special->status=0;
    $special->update();
    return redirect('/specials')->with('status',
    'la special '.$special->nom_special.' a ete bien active');
}
}
