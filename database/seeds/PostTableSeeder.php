<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $category = new Category;
        $category->name = "ipsum y amet";
        $category->save();

        $post = new Post;
        $post->title = "Nam posuere sed enim non tincidunt.";
        $post->url = str_slug("Nam posuere sed enim non tincidunt.");
        $post->excerpt = " consectetur adipiscing elit. Sed vitae congue ipsum, quis sollicitudin tellus. Sed vitae blandit nisl. Nulla ac fringilla massa. Nunc viverra, ligula at euismod porta";
        $post->body = "<p consectetur adipiscing elit. Sed vitae congue ipsum, quis sollicitudin tellus. Sed vitae blandit nisl. Nulla ac fringilla massa. Nunc viverra, ligula at euismod porta, metus lacus mattis lorem, non volutpat nibh ex ut diam. Nunc iaculis ornare rhoncus. Pellentesque sed accumsan justo, ut semper nibh. Nullam commodo ex at justo blandit accumsan. Etiam aliquam posuere massa non blandit. Quisque tristique ligula et libero tempus, a ornare turpis convallis.</p> <blockquote>Integer non eros elit. Cras facilisis est eu aliquam sodales. Aliquam quis ante quis risus tempus imperdiet ac non enim. Phasellus tincidunt nec est eu viverra. Sed molestie, nibh vel faucibus tristique, urna nisl bibendum libero, quis laoreet tellus magna eget turpis. Vivamus rutrum cursus diam nec vehicula. Nulla a dictum orci, ac efficitur tortor. Fusce diam massa, pellentesque auctor tortor vitae, blandit eleifend magna. </blockquote>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();
        //Duplica las etiquetas
        //$post->tags()->attach(Tag::create(['name' => 'php']));
        $post->tags()->sync(Tag::create(['name' => 'consectetur']));


        $post = new Post;
        $post->title = "Lorem ipsum dor sit aet, consectetur.";
        $post->url = str_slug('Lorem ipsum dor sit aet, consectetur.'); 
        $post->excerpt = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sagittis ligula aliquam metus dapibus, eget semper nunc cursus. Phasellus ornare nunc quis lorem consequat egestas. Nulla dui metus, aliquam et dignissim id, aliquet finibus erat. Sed quis enim sit amet purus gravida vulputate et non tortor. Aenean pretium imperdiet elit, ut viverra orci auctor euismod. Praesent porta velit ac velit sagittis, lobortis ";
        $post->body = "<p>Quisque eget cursus nisl, vel aliquam neque. Vestibulum ullamcorper nibh ut elementum luctus. In hac habitasse platea dictumst. Quisque faucibus, ex imperdiet ullamcorper porttitor, nibh dui tristique risus, vel condimentum diam elit quis quam. Proin magna nisl, tincidunt quis porttitor eu, varius et risus. Nullam blandit ante et dui maximus iaculis. Maecenas dictum semper urna non faucibus. Vivamus augue nisl, fermentum ac malesuada a, efficitur nec mauris. Morbi aliquam diam vel finibus accumsan. Cras scelerisque sit amet metus sit amet congue. Nulla porttitor facilisis bibendum.</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->sync(Tag::create(['name' => 'ligula']));

        $post = new Post;
        $post->title = "Vivamus mattis ligula at est ultricies.";
        $post->url = str_slug('Vivamus mattis ligula at est ultricies.'); 
        $post->excerpt = "Praesent magna arcu, tempus sed hendrerit nec, gravida et risus. Phasellus mi ex, facilisis at sodales quis, imperdiet vitae leo. Pellentesque ac diam ac arcu sodales volutpat. Vestibulum suscipit dignissim felis non interdum. Morbi bibendum, nisi eu facilisis maximus, quam sapien consectetur sem, vel lacinia risus eros id nisi. Curabitur felis lacus, molestie et nulla non, suscipit faucibus lorem";
        $post->body = "<p>Donec gravida tempor tincidunt. Donec pellentesque eget sapien ac faucibus. Praesent luctus velit vitae urna commodo varius. Sed scelerisque sed metus id euismod. Cras cursus sapien arcu, id elementum sem posuere sed. Mauris sed volutpat quam. Cras ante enim, ultricies commodo lobortis sit amet, sagittis vel felis. Sed sit amet rhoncus sem. Aliquam feugiat consectetur bibendum. Suspendisse sed congue magna. Vestibulum rutrum arcu vel massa dictum, consectetur semper enim tincidunt. Morbi interdum erat vel nisi maximus maximus. Aenean iaculis, erat eget mollis lacinia, erat massa fermentum dui, vel tristique augue ligula et erat. Vivamus id velit ligula.</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->sync(Tag::create(['name' => 'Aenean']));


        $post = new Post;
        $post->title = "Curabitur porta tempus fermentum.";
        $post->url = str_slug('Curabitur porta tempus fermentum.'); 
        $post->excerpt = "Donec porttitor tortor id arcu malesuada suscipit. Maecenas ac nisi a elit euismod tempus a non ipsum. Nullam sit amet urna orci. Etiam aliquam laoreet sem a molestie. In a finibus augue. Cras at commodo ipsum. Nullam gravida quam nulla. Nam porttitor cursus sem, a aliquam metus suscipit iaculis. Suspendisse feugiat justo non iaculis pretium. Nunc rutrum velit commodo ligula finibus, id pharetra nulla ";
        $post->body = "<p>congue at varius ut, tristique nec turpis. Aliquam sed mauris sapien. Nullam et diam nibh. Mauris fringilla tellus enim, at vulputate enim finibus et. Quisque et aliquet ipsum. Nulla euismod sagittis arcu. Etiam ex nisi, porttitor sed maximus eget, varius vulputate orci. Duis id ipsum sit amet arcu malesuada posuere in et lorem. Vivamus nulla nisl, ornare vel sem non, dignissim euismod risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce interdum, ipsum id ultricies euismod, metus metus suscipit metus, ut posuere enim sapien ac erat.</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->sync(Tag::create(['name' => 'tincidunt']));

        // $post = new Post;
        // $post->title = "Aliquam bibendum velit et dolor congue.";
        // $post->url = str_slug('Aliquam bibendum velit et dolor congue.'); 
        // $post->excerpt = "Cras semper leo purus, at congue ligula ornare id. Aliquam porttitor turpis a aliquam laoreet. Phasellus laoreet nulla at leo consectetur imperdiet";
        // $post->body = "<p>Aliquam bibendum velit et dolor congue, quis facilisis odio congue. Cras semper leo purus, at congue ligula ornare id. Aliquam porttitor turpis a aliquam laoreet. Phasellus laoreet nulla at leo consectetur imperdiet. Fusce vel feugiat lacus. Nunc odio tellus, suscipit id turpis ut, aliquam hendrerit diam. Aenean at enim dui. Donec mattis diam nisi, in accumsan tellus aliquet in. Praesent consequat imperdiet auctor. Suspendisse ut magna at metus egestas blandit. Aliquam porta malesuada lectus. Suspendisse maximus volutpat magna, et maximus risus egestas eget. Proin lacus lacus, finibus quis quam ut, luctus pretium nulla. Vestibulum sem mauris, feugiat eget feugiat vel, dictum vel nisi.</p>";
        // $post->published_at = Carbon::now()->subDays(2);
        // $post->category_id = 1;
        // $post->user_id = 2;
        // $post->save();

        // $post->tags()->sync(Tag::create(['name' => 'tincidunt']));
    }
}
