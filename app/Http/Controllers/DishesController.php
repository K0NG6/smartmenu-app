<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class DishesController extends Controller
{
    public function show()
    {
        return view('dishes', [
            'dishes' => Dish::all()
        ]);
    }

    public function getNewDish()
    {
        return view('addNewDish');
    }

    public function postNewDish(Request $request)
    {
        $newfilename = 'no-image.png';

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $newfilename = uniqid('dish_') . '.' . $file->getClientOriginalExtension();


            $upload_folder = 'public/images';

            Storage::putFileAs($upload_folder, $file, $filename);

            //Создаем миниатюру изображения и сохраняем ее
            $thumbnail = Image::make(Storage::path('/public/images/').$filename);
            $thumbnail->fit(300, 300);
            $thumbnail->save(Storage::path('/public/images/').$newfilename);
        }

         Dish::create([
            'name' => $request->name,
            'description' => $request->description,
             'image' => 'images/'.$newfilename
        ]);

        return redirect('/dishes');
    }

    public function editDish($id)
    {
        $dish = Dish::findOrFail($id);
        return view('editDish',[
            'dish' => $dish
        ]);
    }

    public function postEditDish($id, Request $request)
    {

        $dish = Dish::findOrFail($id);

        $data['name'] = $request->name;
        $data['description'] = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $newfilename = uniqid('dish_') . '.' . $file->getClientOriginalExtension();


            $upload_folder = 'public/images';

            Storage::putFileAs($upload_folder, $file, $filename);

            //Создаем миниатюру изображения и сохраняем ее
            $thumbnail = Image::make(Storage::path('/public/images/').$filename);
            $thumbnail->fit(300, 300);
            $thumbnail->save(Storage::path('/public/images/').$newfilename);
            $data['image'] = 'images/'.$newfilename;
        }
        $dish->update($data);

        return redirect('/dishes');
    }

    public function deleteDish($id)
    {

        $dish=Dish::find($id);
        $dish->delete();
        return redirect('/dishes')->with('success','Task deleted successfully');
    }
}
