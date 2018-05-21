<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sastrawi\Stemmer\StemmerFactory;

class StemController extends Controller
{
    public function __construct()
    {
        # code...
    }

    public function postStem(Request $request)
    {
        $kalimat = $request->sentence;
        $kata = preg_split("/[\s,]+/", $kalimat);
        $sentence = strtolower($request->sentence);
        $words = preg_split("/[\s,]+/", $sentence);
        //nazief
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();
        for ($i=0; $i < count($words); $i++) {
            $before_nazief[$i] = microtime(true);
            $outputs_nazief[$i] = $stemmer->stem($words[$i]);
            $after_nazief[$i] = microtime(true);
            $time_nazief[$i] = $after_nazief[$i]-$before_nazief[$i];
        }
        
        $stopwords = [
            'ada', 'adanya', 'adalah', 'adapun', 'agak', 'agaknya', 'agar', 'akan', 'akankah', 'akhirnya', 'aku', 'akulah', 'amat', 'amatlah', 'anda', 'andalah', 'antar', 'diantaranya', 'antara', 'antaranya', 'diantara', 'apa', 'apaan', 'mengapa', 'apabila', 'apakah', 'apatah', 'atau', 'ataukah', 'ataupun', 'bagai', 'bagaikan', 'lah', 'lain', 'lainnya', 'melainkan', 'selaku', 'lalu', 'melalaui', 'terlalu', 'lama', 'lamanya', 'selama', 'selama-lamanya', 'selamanya', 'lebih', 'terlebih', 'bermacam', 'bermacam-macam', 'macam', 'semacam', 'maka', 'makanya', 'makin', 'malah', 'malahan', 'mampu', 'mampukah', 'mana', 'manakala', 'manalagi', 'masih', 'masihkah', 'semasih', 'masing',
            'sebagai', 'sebagainya', 'bagaimana', 'bagaimana', 'sebagaimana', 'bagaimanakah', 'bagi', 'bahkan', 'bahwa', 'bahwasanya', 'sebaliknya', 'banyak', 'sebanyak', 'beberapa', 'seberapa', 'begini', 'beginian', 'beginikah', 'beginilah', 'sebegini', 'begitu', 'begitukah', 'begitulah', 'begitupun', 'sebegitu', 'belum', 'belumlah', 'sebelum', 'sebelumnya', 'sebenarnya', 'berapa', 'berapakah', 'berapalah', 'berapapun', 'betulkah', 'sebetulnya', 'biasa', 'biasanya', 'bila', 'bilakah', 'bisa', 'bisakah', 'sebisanya', 'boleh', 'bolehkah', 'bolehlah', 'buat', 'bukan', 'bukankah', 'bukanlah', 'bukannya', 'masing-masing', 'mau', 'maupun', 'semaunya', 'memang', 'mereka', 'merekalah', 'meski', 'meskipun', 'semula', 'mungkin', 'mungkinkah', 'nah', 'namun', 'nanti', 'nantinya', 'nyaris', 'oleh', 'olehnya', 'seorang', 'seseorang', 'pada', 'padanya', 'padahal', 'paling', 'sepanjang', 'pantas', 'sepantasnya', 'sepantasnyalah', 'para', 'pasti', 'pastilah', 'per', 'pernah', 'pula', 'pun', 'merupakan', 'rupanya', 'serupa', 'saat', 'saatnya', 'sesaat', 'saja', 'sajalah', 'saling', 'bersama', 'bersama-sama', 'sama', 'sama-sama', 'sesama', 'sambil',
            'cuma', 'percuma', 'dahulu', 'dalam', 'dan', 'dapat', 'dari', 'daripada', 'dekat', 'demi', 'demikian', 'demikianlah', 'sedemikian', 'dengan', 'depan', 'di', 'dia', 'dialah', 'dini', 'diri', 'dirinya', 'terdiri', 'dong', 'dulu', 'enggak', 'enggaknya', 'entah', 'entahlah', 'terhadap', 'terhadapanya', 'hal', 'hampir', 'hanya', 'hanyalah', 'harus', 'haruslah', 'harusnya', 'seharusnya', 'hendak', 'hendaklah', 'hendaknya', 'hingga', 'sehingga', 'ia', 'ialah', 'ibarat', 'ingin', 'inginkah', 'inginkan', 'ini', 'inikah', 'sampai', 'sana', 'sangat', 'sangatlah', 'saya', 'sayalah', 'se', 'sebab', 'sebabnya', 'sebuah', 'tersebut', 'tersebutlah', 'sedang', 'sedangkan', 'sedikit', 'sedikitnya', 'segala', 'segalanya', 'segera', 'sesegera', 'sejak', 'sejenak', 'sekali', 'sekalian', 'sekalian', 'sekalipun', 'sesekali', 'sekaligus', 'sekarang', 'sekaranglah', 'sekitar', 'sekitarnya', 'sela', 'selain', 'selalu', 'seluruh', 'seluruhnya', 'semakin', 'sementara', 'sempat', 'semua', 'semuanya', 'sendiri', 'sendirinya', 'seolah', 'seolah-olah', 'seperti', 'sepertinya', 'sering', 'seringnya', 'serta', 'siapa',
            'inilah', 'itu', 'itukah', 'itulah', 'jangan', 'jangankan', 'janganlah', 'jika', 'jikalau', 'juga', 'justru', 'kala', 'kalau', 'kalaulah', 'kalaupun', 'berkali-kali', 'sekali-kali', 'kalian', 'kami', 'kamilah', 'kamu', 'kamulah', 'kan', 'kapan', 'kapankah', 'kapanpun', 'dikarenakan', 'karena', 'karenanya', 'ke', 'kecil', 'kemudian', 'kenapa', 'kepada', 'kepadanya', 'ketika', 'seketika', 'khususnya', 'kini', 'kinlah', 'kiranya', 'sekiranya', 'kita', 'kitalah', 'kok', 'lagi', 'lagian', 'siapakah', 'siapapun', 'disini', 'disinilah', 'sini', 'sinilah', 'sesuatu', 'sesuatunya', 'suatu', 'sesudah', 'sesudahnya', 'sudah', 'sudahkah', 'sudahlah', 'supaya', 'tadi', 'tadinya', 'tak', 'tanpa', 'setelah', 'telah', 'tentang', 'tentu', 'tentulah', 'tentunya', 'tertentu', 'seterusnya', 'tapi', 'tetapi', 'setiap', 'tiap', 'setidak-tidaknya', 'setidaknya', 'tidak', 'tidakkah', 'tidaklah', 'toh', 'waduh', 'wah', 'wahai', 'sewaktu', 'walau', 'walaupun', 'wong', 'yaitu', 'yakni', 'yang',
            'berada', 'keadaan', 'akhir', 'akhiri', 'berakhir', 'berakhirlah', 'berakhirnya', 'diakhiri', 'diakhirinya', 'mengakhiri', 'terakhir', 'artinya', 'berarti', 'asal', 'asalkan', 'atas', 'awal', 'awalnya', 'berawal', 'berbagai', 'bagian', 'sebagaian', 'baik', 'sebaik', 'sebaik-baiknya', 'sebaiknya', 'bakal', 'bakalan', 'balik', 'terbanyak', 'bapak', 'baru', 'bawah', 'belakang', 'belakangan', 'bernar', 'benarkah', 'benarlah', 'beri', 'berikan', 'diberi', 'diberikan', 'diberikannya', 'memberi', 'memberikan', 'besar', 'sebesar', 'betul', 'kebetulan', 'masa', 'semasa', 'masalah', 'masalahnya', 'termasuk', 'semata', 'semata-mata', 'diminta', 'dimintai', 'meminta', 'memintakan', 'minta', 'mirip', 'dimisalkan', 'memisalkan', 'misal', 'misalkan', 'misalnya', 'semisal', 'semisalnya', 'bermula', 'mula', 'mulanya', 'dimulai', 'dimulailah', 'dimulainya', 'memulai', 'mulai', 'mulailah', 'dimungkinkan', 'kemungkinan', 'kemungkinannya', 'menaiki', 'naik', 'menanti', 'menanti-nanti', 'menantikan', 'menyatakan', 'nyatanya', 'ternyata', 'pak', 'panjang', 'dipastikan', 'memastikan', 'penting', 'pentingnya', 'diperlukan', 'diperlukannya',
            'dibuat', 'dibuatnya', 'diperbuat', 'diperbuatnya', 'membuat', 'memperbuat', 'bulan', 'bung', 'cara', 'caranya', 'secara', 'cukup', 'cukupkah', 'cukuplah', 'secukupnya', 'terdahulu', 'didapat', 'mendapat', 'mendapatkan', 'terdapat', 'berdatangan', 'datang', 'didatangkan', 'mendatang', 'mendatangi', 'mendatangkan', 'dua', 'kedua', 'keduanya', 'empat', 'seenaknya', 'digunakan', 'dipergunakan', 'guna', 'gunakan', 'mempergunakan', 'menggunakan', 'hari', 'berkehendak', 'menghendaki', 'diibaratkan', 'diibaratkannya', 'ibaratkan', 'ibaratnya', 'mengibaratkan', 'mengibaratkannya', 'ibu', 'berikut', 'berikutnya', 'ikut', 'diingat', 'memerlukan', 'perlu', 'perlukah', 'perlunya', 'seperlunya', 'pertama', 'pertama-tama', 'memihak', 'pihak', 'pihaknya', 'sepihak', 'pukul', 'dipunyai', 'mempunyai', 'punya', 'merasa', 'rasa', 'rasanya', 'terasa', 'rata', 'berupa', 'disampaikan', 'kesampaian', 'menyampaikan', 'sampai-sampai', 'sampaikan', 'sesampai', 'tersampaikan', 'menyangkut', 'satu', 'disebut', 'disebutkan', 'disebutkannya', 'menyebutkan', 'sebut', 'sebutlah', 'sebutnya', 'keseluruhan', 'keseluruhannya', 'menyeluruh', 'sendirian', 'bersiap', 'bersiap-siap', 'mempersiapkan', 'menyiapkan', 'siap', 'dipersoalkan', 'mempersoalkan', 'persoalan', 'soal', 'soalnya',
            'diingatkan', 'ingat', 'ingat-ingat', 'mengingat', 'mengingatkan', 'seingat', 'teringat', 'teringat-ingat', 'berkeinginan', 'diinginkan', 'keinginan', 'menginginkan', 'jadi', 'jadilah', 'jadinya', 'menjadi', 'terjadi', 'terjadilah', 'terjadinya', 'jauh', 'sejauh', 'dijawab', 'jawab', 'jawaban', 'jawabnya', 'menjawab', 'dijelaskan', 'dijelaskannya', 'jelas', 'jelaskan', 'jelaslah', 'jelasnya', 'menjelaskan', 'berjumlah', 'jumlah', 'jumlahnya', 'sejumlah', 'sekadar', 'sekadarnya', 'kasus', 'berkata', 'dikatakan', 'dikatannya', 'kata', 'katakan', 'katakanlah', 'katanya', 'mengatakan', 'mengatakannya', 'sekecil', 'keluar', 'diketahui', 'diketahuinya', 'mengetahui', 'tahu', 'tahun', 'ditambahkan', 'menambahkan', 'tambah', 'tambahnya', 'tampak', 'tampaknya', 'ditandaskan', 'menandaskan', 'tandas', 'tandasnya', 'bertanya', 'bertanya-tanya', 'dipertanyakan', 'ditanya', 'ditanyai', 'ditanyakan', 'mempertanyakan', 'menanya', 'menanyai', 'menanyakan', 'pertanyaan', 'pertanyakan', 'tanya', 'tanyakan', 'tanyanya', 'ditegaskan', 'menegaskan', 'tegas', 'tegasnya', 'setempat', 'tempat', 'setengah', 'tengah', 'tepat', 'terus', 'tetap', 'setiba', 'setibanya', 'tiba', 'tiba-tiba', 'tiga', 'setinggi', 'tinggi', 'ditujukan', 'menuju', 'tertuju',
            'kembali', 'berkenan', 'mengenai', 'bekerja', 'dikerjakan', 'mengerjakan', 'dikira', 'diperkirakan', 'kira', 'kira-kira', 'memperkirakan', 'mengira', 'terkira', 'kurang', 'sekurang-kurangnya', 'sekurangnya', 'berlainan', 'dilakukan', 'melakukan', 'berlalu', 'dilalui', 'ketelaluan', 'kelamaan', 'berlangsung', 'lanjut', 'lanjutnya', 'selanjutnya', 'berlebihan', 'lewat', 'dilihat', 'diperlihatkan', 'kelihatan', 'kelihatannya', 'melihat', 'melihatnya', 'memperlihatkan', 'terlihat', 'kelima', 'lima', 'luar', 'bermaksud', 'dimaksud', 'dimaksudkan', 'dimaksudkannya', 'dimaksudnya', 'semampu', 'semampunya', 'ditunjuk', 'ditunjuki', 'ditunjukkan', 'ditunjukkannya', 'ditunjuknya', 'menunjuk', 'menunjuki', 'menunjukkan', 'menunjukknya', 'tunjuk', 'berturut', 'berturut-turut', 'menurut', 'turut', 'bertutur', 'dituturkan', 'dituturkannya', 'menuturkan', 'tutur', 'tuturnya', 'diucapkan', 'diucapkannya', 'mengucapkan', 'mengucapkannya', 'ucap', 'ucapnya', 'berujar', 'ujar', 'ujarnya', 'umum', 'umumnya', 'diungkapkan', 'mengungkapkan', 'ungkap', 'ungkapnya', 'untuk', 'usah', 'seusai', 'usai', 'terutama', 'waktu', 'waktunya', 'meyakini', 'meyakinkan', 'yakin' 
        ];
        $stem_nazief = preg_replace('/\b('.implode('|',$stopwords).')\b/','',$outputs_nazief);
        //tala
        for ($i=0; $i < count($words); $i++) {
            $before_tala[$i] = microtime(true);
            if((substr($words[$i], -3) == 'kah' )||( substr($words[$i], -3) == 'lah' )||( substr($words[$i], -3) == 'pun' )){
                $words[$i] = substr($words[$i], 0, -3);			
            }
            if(strlen($words[$i]) > 4){
                if((substr($words[$i], -2)== 'ku')||(substr($words[$i], -2)== 'mu')){
                    $words[$i] = substr($words[$i], 0, -2);
                }else if((substr($words[$i], -3)== 'nya')){
                    $words[$i] = substr($words[$i],0, -3);
                }
            }
            if(substr($words[$i],0,4)=="meng"){
                if(substr($words[$i],4,1)=="e"||substr($words[$i],4,1)=="u"){
                $words[$i] = "k".substr($words[$i],4);
                }else{
                $words[$i] = substr($words[$i],4);
                }
            }else if(substr($words[$i],0,4)=="meny"){
                $words[$i] = "s".substr($words[$i],4);
            }else if(substr($words[$i],0,3)=="men"){
                $words[$i] = substr($words[$i],3);
            }else if(substr($words[$i],0,3)=="mem"){
                if(substr($words[$i],3,1)=="a" || substr($words[$i],3,1)=="i" || substr($words[$i],3,1)=="e" || substr($words[$i],3,1)=="u" || substr($words[$i],3,1)=="o"){
                    $words[$i] = "p".substr($words[$i],3);
                }else{
                    $words[$i] = substr($words[$i],3);
                }
            }else if(substr($words[$i],0,2)=="me"){
                $words[$i] = substr($words[$i],2);
            }else if(substr($words[$i],0,4)=="peng"){
                if(substr($words[$i],4,1)=="e" || substr($words[$i],4,1)=="a"){
                $words[$i] = "k".substr($words[$i],4);
                }else{
                $words[$i] = substr($words[$i],4);
                }
            }else if(substr($words[$i],0,4)=="peny"){
                $words[$i] = "s".substr($words[$i],4);
            }else if(substr($words[$i],0,3)=="pen"){
                if(substr($words[$i],3,1)=="a" || substr($words[$i],3,1)=="i" || substr($words[$i],3,1)=="e" || substr($words[$i],3,1)=="u" || substr($words[$i],3,1)=="o"){
                    $words[$i] = "t".substr($words[$i],3);
                }else{
                    $words[$i] = substr($words[$i],3);
                }
            }else if(substr($words[$i],0,3)=="pem"){
                if(substr($words[$i],3,1)=="a" || substr($words[$i],3,1)=="i" || substr($words[$i],3,1)=="e" || substr($words[$i],3,1)=="u" || substr($words[$i],3,1)=="o"){
                    $words[$i] = "p".substr($words[$i],3);
                }else{
                    $words[$i] = substr($words[$i],3);
                }
            }else if(substr($words[$i],0,2)=="di"){
                $words[$i] = substr($words[$i],2);
            }else if(substr($words[$i],0,3)=="ter"){
                $words[$i] = substr($words[$i],3);
            }else if(substr($words[$i],0,2)=="ke"){
                $words[$i] = substr($words[$i],2);
            }
            if(substr($words[$i],0,3)=="ber"){
                $words[$i] = substr($words[$i],3);
            }else if(substr($words[$i],0,3)=="bel"){
                $words[$i] = substr($words[$i],3);
            }else if(substr($words[$i],0,2)=="be"){
                $words[$i] = substr($words[$i],2);
            }else if(substr($words[$i],0,3)=="per" && strlen($words[$i]) > 5){
                $words[$i] = substr($words[$i],3);
            }else if(substr($words[$i],0,2)=="pe"  && strlen($words[$i]) > 5){
                $words[$i] = substr($words[$i],2);
            }else if(substr($words[$i],0,3)=="pel"  && strlen($words[$i]) > 5){
                $words[$i] = substr($words[$i],3);
            }else if(substr($words[$i],0,2)=="se"  && strlen($words[$i]) > 5){
                $words[$i] = substr($words[$i],2);
            }
            if (substr($words[$i], -3)== "kan" ){
                $words[$i] = substr($words[$i], 0, -3);
            }
            else if(substr($words[$i], -1)== "i" ){
                $words[$i] = substr($words[$i], 0, -1);
            }else if(substr($words[$i], -2)== "an"){
                $words[$i] = substr($words[$i], 0, -2);
            }
            $outputs_tala[$i] = $words[$i];
            $after_tala[$i] = microtime(true);
            $time_tala[$i] = $after_tala[$i]-$before_tala[$i];
        }
        $stem_tala = preg_replace('/\b('.implode('|',$stopwords).')\b/','',$outputs_tala);
        return response()->json([$kata, $stem_nazief, $stem_tala, $time_nazief, $time_tala,'success' => true]);
    }
}
