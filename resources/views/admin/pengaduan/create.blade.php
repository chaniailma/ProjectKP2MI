@extends('layouts.admin')

@section('title', 'Form Pengaduan PMI | KP2MI')

@section('content')
<section class="bg-white min-h-[calc(100vh-140px)] flex items-center justify-center px-4">
    <div class="max-w-5xl mx-auto bg-white shadow rounded-lg p-8">

        {{-- HEADER --}}
        <div class="flex items-center gap-4 mb-8 border-b pb-4">
            <img src="{{ asset('images/logo-bp2mi.png') }}" class="h-14" alt="KP2MI">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Form Pengaduan PMI</h2>
                <p class="text-sm text-gray-500">
                    Kementerian Pelindungan Pekerja Migran Indonesia (KP2MI)
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.pengaduan.store') }}">
            @csrf

            {{-- ================= TANGGAL ================= --}}
            <div class="mb-10">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium">Tanggal Entry</label>
                        <input type="text" name="tanggal_entry"
                               value="{{ now()->format('d/m/Y') }}" readonly
                               class="form-input bg-gray-200">
                    </div>
                    <div>
                        <label class="text-sm font-medium">Tanggal Lapor</label>
                        <input type="date" name="tanggal_lapor" class="form-input">
                    </div>
                </div>
            </div>

            {{-- ================= DATA PENGADU ================= --}}
            <div class="mb-10">
            <h4 style="font-size: 24px; font-family: Arial, sans-serif; font-weight: 600; text-align: center; margin-bottom: 2rem; letter-spacing: 0.05em;">
            DATA PENGADU
            </h4>   
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm font-medium">Media Pengaduan</label> <span class="text-red-500">*</span>
                        <select name="media_pengaduan" class="form-input">
                            <option value="">-- Pilih Media --</option>
                            <option>Langsung</option>
                            <option>Surat</option>
                            <option>Media Sosial</option>
                            <option>Email</option>
                            <option>Telepon</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Nama Pengadu</label>
                        <input type="text" name="nama_pengadu" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Telepon Pengadu</label>
                        <input type="text" name="telepon_pengadu" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Relasi dengan PMI</label>
                        <select name="relasi_pengadu" class="form-input">
                            <option value="">-- Pilih Relasi --</option>
                            <option>PMI</option>
                            <option>Keluarga</option>
                            <option>Kuasa Hukum</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="text-sm font-medium">Alamat Pengadu</label>
                    <textarea name="alamat_pengadu" class="form-textarea"></textarea>
                </div>
            </div>

            {{-- ================= DATA PMI ================= --}}
            <div class="mb-10">
               <div class="mb-10">
            <h4 style="font-size: 24px; font-family: Arial, sans-serif; font-weight: 600; text-align: center; margin-bottom: 2rem; letter-spacing: 0.05em;">
            DATA PMI
            </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm font-medium">Nomor Paspor</label>
                        <input type="text" name="nomor_paspor" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Nama PMI</label><span class="text-red-500">*</span>
                        <input type="text" name="nama_pmi" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">NIK</label>
                        <input type="text" name="nik" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Jenis Kelamin</label><span class="text-red-500">*</span>
                        <select name="gender" class="form-input">
                            <option value="">-- Pilih --</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Status Perkawinan</label><span class="text-red-500">*</span>
                        <select name="status_marital" class="form-input">
                            <option value="">-- Pilih --</option>
                            <option>Belum Kawin</option>
                            <option>Kawin</option>
                            <option>Janda/Duda</option>
                            <option>UNKNOW</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Pendidikan Terakhir</label><span class="text-red-500">*</span>
                        <select name="jenjang_pendidikan" class="form-input">
                            <option value="">-- Pilih --</option>
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA</option>
                            <option>Diploma</option>
                            <option>Sarjana</option>
                            <option>UNKNOW</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="text-sm font-medium">Alamat PMI di Indonesia</label>
                    <textarea name="alamat_indonesia" class="form-textarea"></textarea>
                </div>

                    <div>
                        <label class="text-sm font-medium">Provinsi</label><span class="text-red-500">*</span>
                        <select name="provinsi" id="provinsi" class="form-input">
                            <option value="">-- Pilih Provinsi --</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Kabupaten / Kota</label><span class="text-red-500">*</span>
                        <select name="kabupaten_kota" id="kabupaten" class="form-input" disabled>
                            <option value="">-- Pilih Kabupaten / Kota --</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm font-medium">Alamat Penempatan</label>
                        <input type="text" name="alamat_penempatan" class="form-input">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm font-medium">Negara Penempatan</label><span class="text-red-500">*</span>
                        <input type="text" name="negara_penempatan" class="form-input">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm font-medium">Nama Agensi</label>
                        <input type="text" name="nama_agensi" class="form-input">

                        <div class="md:col-span-2">
                        <label class="text-sm font-medium">P3MI</label><span class="text-red-500">*</span>
                        <select name="p3mi" class="form-input">
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="987">AAD PRATAMA KARYA</option>
                            <option value="113">ABDI BELA PERSADA1</option>
                            <option value="759">ABDI MATRA</option>
                            <option value="122">ABDI WIRA PRAJA</option>
                            <option value="1232">ABDILLAH PUTRA TAMALA</option>
                            <option value="750">ABU;</option>
                            <option value="115">ABUL PRATAMA JAYA</option>
                            <option value="972">ABUNI'MAH SEJAHTERA UTAMA</option>
                            <option value="116">ADHI MAKMUR OENGGOEL INSANI</option>
                            <option value="118">ADI SANTA KENCANA MAS</option>
                            <option value="988">ADILA PREZKIFARINDO DUTA</option>
                            <option value="119">AGESA ASA JAYA</option>
                            <option value="120">AGRELIA PUTRA SEJAHTERA</option>
                            <option value="121">AGROSIN MARUMI</option>
                            <option value="983">AINI PUTRI MANDIRI ABADI</option>
                            <option value="584">AINUL ASEP ABADI</option>
                            <option value="123">AJI AYAHBUNDA SEJATI</option>
                            <option value="777">AKARINDKA</option>
                            <option value="430">AKARINKA UTAMA SEJAHTERA</option>
                            <option value="124">AKBAR INSAN PRIMA</option>
                            <option value="980">AKKA AL MATAR</option>
                            <option value="125">AL HIJAZ INDOJAYA</option>
                            <option value="909">Al Husein Putra Mandiri</option>
                            <option value="126">AL IRSHAD DIAN SURYA</option>
                            <option value="678">AL IRSHAD MANDIRI</option>
                            <option value="638">AL KHARIM</option>
                            <option value="427">AL MANAR TIARA ABADI</option>
                            <option value="127">AL ROYYAN CAHAYA MANDIRI</option>
                            <option value="432">AL WIHDAH JAYA SENTOSA</option>
                            <option value="746">AL-JAIDI IKHWAN</option>
                            <option value="128">ALAM PERMAI INDONESIA</option>
                            <option value="129">ALATAS IKHWAN</option>
                            <option value="130">ALBAROKAH CORPORATION</option>
                            <option value="131">ALFA NUSANTARA PERDANA</option>
                            <option value="132">ALFATH NUUR NISA</option>
                            <option value="133">ALFINDO MAS BUANA</option>
                            <option value="134">ALFIRA PERDANA JAYA</option>
                            <option value="597">ALGA MITRA INDAH</option>
                            <option value="903">ALGAN TRITAMA</option>
                            <option value="135">ALHASAN MAJU LESTARI</option>
                            <option value="1235">ALHGONY AFLAH ABADI</option>
                            <option value="688">ALHIKMAH JAYA BHAKTI</option>
                            <option value="137">ALKURNIA SENTOSA INTERNASIONAL</option>
                            <option value="138">ALMAS CORPORATION</option>
                            <option value="139">ALMINA INDAH</option>
                            <option value="595">ALVERDI SURYA BUANA</option>
                            <option value="491">ALWIYA INDAH</option>
                            <option value="521">ALZUBARA MANPOWER INDONESIA</option>
                            <option value="143">AMAL ICHWAN ARINDO</option>
                            <option value="566">AMALIA ROZIKIN JAYA</option>
                            <option value="144">AMALINDO BHAKTI PERSADA</option>
                            <option value="145">AMALINDO LANGGENG</option>
                            <option value="146">AMANAH PUTRA PRATAMA</option>
                            <option value="147">AMANITAMA BERKAH SEJATI</option>
                            <option value="148">AMEASTARA RAYA CORP</option>
                            <option value="149">AMIL FAJAR INTERNATIONAL</option>
                            <option value="150">AMIRA PRIMA</option>
                            <option value="151">AMRI MARGATAMA</option>
                            <option value="1222">AMRITAS MAHESA PRIMA</option>
                            <option value="878">AMSI</option>
                            <option value="152">ANDALAN MITRA PRESTASI</option>
                            <option value="510">ANDHIKA PUTRA MANDIRI</option>
                            <option value="153">ANDHINI EKA KARYA</option>
                            <option value="154">ANDIKA BILENTA BAKTI</option>
                            <option value="979">ANDIKA SUMBER REJEKI</option>
                            <option value="155">ANDROMEDA GRAHA</option>
                            <option value="883">ANGKARINKA</option>
                            <option value="156">ANSFRIDA FAMILY</option>
                            <option value="157">ANTAR BANGSA CITRA DHARMAINDO</option>
                            <option value="158">ANTAR INDOSADYA</option>
                            <option value="159">ANTAR TENAGA MANDIRI</option>
                            <option value="834">ANTO BINTAN PERMAI</option>
                            <option value="815">ANUGERAH DIANTAS</option>
                            <option value="775">ANUGERAH SUMBER REJEKI</option>
                            <option value="440">ANUGERAH USAHA JAYA</option>
                            <option value="954">ANUGRAH GRAHA PERTIWI, PT</option>
                            <option value="428">AQBAL PUTRA MANDIRI</option>
                            <option value="162">ARAFA DUTA JASA</option>
                            <option value="163">ARAFAH BINTANG PERKASA</option>
                            <option value="165">ARMINA MITRA KARYA</option>
                            <option value="1206">ARNI FAMILY</option>
                            <option value="166">ARSINNA ARDIANDI UTAMA</option>
                            <option value="167">ARUNDA BAYU</option>
                            <option value="545">ARWANA CITRA LESTARI</option>
                            <option value="168">ARYA DUTA BERSAMA</option>
                            <option value="502">ASA JAYA</option>
                            <option value="520">ASAMULIA INDO MANPOWER</option>
                            <option value="1000">ASFIZ LANGGENG ABADI</option>
                            <option value="562">ASIA SKILLED RESOURCES</option>
                            <option value="825">ASINDO</option>
                            <option value="169">ASRI CIPTA TENAGA KARYA</option>
                            <option value="1231">ASSALAM BERSAUDARA</option>
                            <option value="170">ASSALAM KARYA MANUNGGAL</option>
                            <option value="1221">ASSALAM KARYA MANUNGGAL PUTRA</option>
                            <option value="171">ASSAMI ANANDA MANDIRI</option>
                            <option value="172">ASSANACITA MITRA BANGSA</option>
                            <option value="173">ASSANATAMA KARYA MANDIRI</option>
                            <option value="498">AULA GRAHA</option>
                            <option value="530">AULIA DUTA PRATAMA</option>
                            <option value="175">AVCOJAYA MANUNGGAL</option>
                            <option value="176">AVIDA AVIADUTA</option>
                            <option value="177">AWWAN BINA INSANI</option>
                            <option value="178">BABA METRO UTAMA</option>
                            <option value="179">BAGOES BERSAUDARA</option>
                            <option value="180">BAHAM PUTRA ABADI</option>
                            <option value="1220">BAHAN MEGAH PRESTASI</option>
                            <option value="1237">BAHANA MEGA PRESTASI</option>
                            <option value="181">BAHANA TIMUR MEGAH</option>
                            <option value="182">BAHANA TRIMITRA SELARAS</option>
                            <option value="489">BAHRINDO MAHDI</option>
                            <option value="587">BAHTERA TULUS KARYA</option>
                            <option value="531">BAJRI PUTRA MANDIRI</option>
                            <option value="4">BAKHTIR IKHWAN</option>
                            <option value="514">BALANTA BUDI PRIMA</option>
                            <option value="438">BALI DUTA MANDIRI</option>
                            <option value="565">BALI PARADISE CITRA DEWATA</option>
                            <option value="981">BALI PESONA ABADI</option>
                            <option value="443">BAMA MAPAN BAHAGIA</option>
                            <option value="7">BANDAR LAGUNA</option>
                            <option value="647">BANDARAYA</option>
                            <option value="444">BANGUN GUNUNGSARI</option>
                            <option value="9">BANTAL PERKASA SEJAHTERA</option>
                            <option value="10">BANUNUSA UTAMA</option>
                            <option value="11">BANYU SEWU BAHTERA</option>
                            <option value="12">BARAJA GITA PUTRA</option>
                            <option value="13">BARFO MAHDI</option>
                            <option value="14">BARKAHAYU SAFARINDO</option>
                            <option value="873">BAROKAH JAYA</option>
                            <option value="15">BAYU SATRIA DEWI</option>
                            <option value="958">BERKAH GUNA SELARAS</option>
                            <option value="494">BHAKTI PERSADA JAYA</option>
                            <option value="533">BHAYANGKARA LABOUR SUPPLIER</option>
                            <option value="496">BIDAR PUTRA SUKSES</option>
                            <option value="446">BIDAR SATRIA ABADI</option>
                            <option value="19">BIDAR TIMUR</option>
                            <option value="681">BIJAK</option>
                            <option value="955">BIN HAMMOUD SAFARINDO</option>
                            <option value="20">BINA ADIDAYA MANDIRI INTERNATIONAL</option>
                            <option value="21">BINA BAHTERA KARYA MANDIRI</option>
                            <option value="447">BINA DINAMITA RAMA</option>
                            <option value="719">BINA DUTA AMANAH MANDIRI</option>
                            <option value="30">BINA GALA MITRA</option>
                            <option value="25">BINA KERJA CEMERLANG (BIJAC)</option>
                            <option value="26">BINA KRIDATAMA LESTARI</option>
                            <option value="575">BINA MANUNGGAL INSAN SETIA</option>
                            <option value="27">BINA SETIA CORPORA</option>
                            <option value="448">BINA SWADAYA KERTA UTAMA</option>
                            <option value="668">BINA USAHA MALINDO</option>
                            <option value="31">BINAJASA ABADI KARYA (BIJAK)</option>
                            <option value="518">BINAJASA ABADI KARYA (BIJAK)</option>
                            <option value="788">BINAKARYA WELASTERI</option>
                            <option value="33">BINAMANDIRI MULYA RAHARJA</option>
                            <option value="34">BINAWAN INTI UTAMA</option>
                            <option value="36">BINHASAN MAJU SEJAHTERA</option>
                            <option value="487">BINTAN NIRWANA</option>
                            <option value="1209">BINTANG LIMA BRATA</option>
                            <option value="37">BINTANG SUKMA SEJATI</option>
                            <option value="912">BNP2TKI</option>
                            <option value="932">BP3TKI CIRACAS</option>
                            <option value="927">BP3TKI MEDAN</option>
                            <option value="943">BP3TKI NUNUKAN</option>
                            <option value="913">BP3TKI PALEMBANG</option>
                            <option value="1201">BRATA KARYA INDONESIA</option>
                            <option value="525">BUANA LINTAS KARYA</option>
                            <option value="968">BUANA RIZQIA DUTA SELARAS</option>
                            <option value="38">BUANA SAFIRA ABADI</option>
                            <option value="39">BUDI AGUNG BINATARA</option>
                            <option value="40">BUGHSAN LABRINDO</option>
                            <option value="41">BUKIT MAYAK ASRI</option>
                            <option value="563">BULKAS MITRA SARANA</option>
                            <option value="42">BUMENJAYA DUTA PUTRA</option>
                            <option value="973">BUMENJAYA EKA PUTRA</option>
                            <option value="1195">BUMENJAYA PRADUTA ABADI</option>
                            <option value="43">BUMI MAS ANTARNUSA</option>
                            <option value="567">BUMI MAS CITRA MANDIRI</option>
                            <option value="978">BUMI MAS INDONESIA MANDIRI</option>
                            <option value="540">BUMI MAS KATONG BESARI</option>
                            <option value="44">CAHYADEWI PRIMADONA</option>
                            <option value="500">CEGER SARI BUANA</option>
                            <option value="534">CEMERLANG BINTANG SEKAWAN</option>
                            <option value="48">CEMERLANG SUMBER DAYA INSANI</option>
                            <option value="52">CIPTA KARSA BUMI LESTARI</option>
                            <option value="51">CIPTA KARYA PERSADA</option>
                            <option value="551">CIPTA REZEKI UTAMA</option>
                            <option value="450">CITRA ABDI NUSA</option>
                            <option value="54">CITRA BINA TENAGA MANDIRI</option>
                            <option value="451">CITRA CATUR UTAMA KARYA</option>
                            <option value="951">CITRA KARYA SEJATI</option>
                            <option value="56">CITRA KARYA SEMESTA</option>
                            <option value="57">CITRA NUSA HUPINDO</option>
                            <option value="503">CITRA NUSA KARYA SEMESTA</option>
                            <option value="564">CITRA PERDANA PERKASA</option>
                            <option value="58">CITRA PUTRA INDARAB</option>
                            <option value="59">CRYSTAL BIRU MEULIGO</option>
                            <option value="764">DAMAS</option>
                            <option value="60">DANAMON WAHANA TENAGA KERJA</option>
                            <option value="61">DASA GRAHA UTAMA</option>
                            <option value="63">DEFITA BERSAUDARA</option>
                            <option value="64">DEKA PERKASA ADIJAYA</option>
                            <option value="65">DEKA PERTINDO CORPORATION</option>
                            <option value="1224">DELLA FADHIL ANUGRA</option>
                            <option value="66">DELTA RONA ADIGUNA</option>
                            <option value="569">DEWI PENGAYOM BANGSA</option>
                            <option value="67">DHAFCO MANUNGGAL SEJATI</option>
                            <option value="1208">DHARMA AYU TENAGA SEJAHTERA</option>
                            <option value="68">DHARMA KARYA RAHARJA</option>
                            <option value="453">DHARMAKERTA RAHARJA</option>
                            <option value="70">DHIEN DHIEN BERKAT</option>
                            <option value="71">DIAN BAKTI SETIA</option>
                            <option value="72">DIAN EMPLOYTAMA</option>
                            <option value="73">DIAN YOGYA PERDANA</option>
                            <option value="74">DIARRAMA PERSADA</option>
                            <option value="989">DIMA KURNIA ABADI</option>
                            <option value="985">DINASTY INSAN MANDIRI</option>
                            <option value="75">DINI NOER AL QOBA</option>
                            <option value="437">DIVA DUTA INDOSA</option>
                            <option value="497">DIYAVI MANPOWER DEVELOPMENT</option>
                            <option value="626">DJAMIN HARAPAN ABADI</option>
                            <option value="77">DUMAS LINTAS BENUA</option>
                            <option value="78">DUTA AMPEL MULIA</option>
                            <option value="79">DUTA ANANDA SETIA</option>
                            <option value="824">DUTA ARAFA</option>
                            <option value="963">DUTA BANTEN MANDIRI</option>
                            <option value="846">DUTA BUANA</option>
                            <option value="82">DUTA FADALIMA</option>
                            <option value="80">DUTA FAJAR BARUTAMA</option>
                            <option value="81">DUTA KUSUMAROS PERSADA</option>
                            <option value="461">DUTA PUTRA BANTEN MANDIRI</option>
                            <option value="977">DUTA PUTRA KAHURIPAN</option>
                            <option value="83">DUTA SAPTA PERKASA</option>
                            <option value="84">DUTA TANGGUH SELARAS</option>
                            <option value="85">DUTA WIBAWA MANDA PUTRA</option>
                            <option value="558">DWI CITRA TRI PATRIA</option>
                            <option value="984">DWI INSAN SETIA UTAMA</option>
                            <option value="806">DWI J</option>
                            <option value="601">DWICITRA PUTRA MANDIRI</option>
                            <option value="87">DWIGUNA JAYA ABADI</option>
                            <option value="88">DWIPA HARITAMA</option>
                            <option value="89">DWIPUTRA METROPOLITAN</option>
                            <option value="90">DWITUNGGAL JAYA ABADI</option>
                            <option value="965">EELSHAFAH ADI WIGUNA MANDIRI</option>
                            <option value="454">EKA JASA ALIM PRIMA</option>
                            <option value="92">EKASANTI JAYA MULYA</option>
                            <option value="93">EKORISTI BERKARYA</option>
                            <option value="776">EL KASAB</option>
                            <option value="1226">ELKA INDONESIA</option>
                            <option value="94">ELKARIM MAKMUR SENTOSA</option>
                            <option value="95">ELSA PUTRI INDAH</option>
                            <option value="96">ERA SUTRA ALAM</option>
                            <option value="97">ESDEMA MANDIRI</option>
                            <option value="98">FAHAD FAJAR MUSTIKA</option>
                            <option value="957">FAJAR BELLA BINTANG RIZKI</option>
                            <option value="99">FAJAR SEMESTA RAYA PERKASA</option>
                            <option value="898">FAJRA S</option>
                            <option value="100">FALAH RIMA HUDAITY BERSAUDARA</option>
                            <option value="101">FALIA SINATRIA SEJATI</option>
                            <option value="462">FARHAN AL SYIFA</option>
                            <option value="102">FAUZI PUTRA HIDAYAT</option>
                            <option value="103">FICOTAMA BINA TERAMPIL</option>
                            <option value="967">FIM ANUGRAH PERKASA</option>
                            <option value="966">FIOKEN KENCANA MANDIRI</option>
                            <option value="104">FIRHADA JAYA</option>
                            <option value="105">FISTA CITY MANPOWER</option>
                            <option value="456">FLAMBOYAN GEMA JASA</option>
                            <option value="107">FORTUNATAMA INSANI</option>
                            <option value="29">FORWARD GLOBAL</option>
                            <option value="881">GALA MITRA</option>
                            <option value="659">GAMALAMA MAKULANO</option>
                            <option value="109">GAPURA DUTA PERSADA</option>
                            <option value="574">GARUDA</option>
                            <option value="570">GASINDO BUALASARI</option>
                            <option value="110">GAYUNG MULYA IKIF</option>
                            <option value="111">GENTA ARDIA ABADI</option>
                            <option value="112">GENTA GUMI SELAPAWIS</option>
                            <option value="204">GITA WISESA PERSADA JAYA</option>
                            <option value="205">GRAHA AYUKARSA</option>
                            <option value="206">GRAHA CIPTA UTAMA</option>
                            <option value="207">GRAHA INDOHIWANA</option>
                            <option value="208">GRAHA INDRA WAHANA PERKASA</option>
                            <option value="1193">GRAHA MITRA BALINDO</option>
                            <option value="592">GRAHA UTAMA</option>
                            <option value="209">GRAHATAMA INDOKARYA</option>
                            <option value="458">GUNA KARYA INSAN MANDIRI</option>
                            <option value="211">GUNA MANDIRI PARIPURNA</option>
                            <option value="459">GUNAWAN SUKSES ABADI</option>
                            <option value="992">HAENA DUTA CEMERLANG</option>
                            <option value="658">HAMPARAN KARYA INSANI</option>
                            <option value="495">HANACO SUCSES</option>
                            <option value="604">HARCOSELARAS SENTOSAJAYA</option>
                            <option value="561">HASAMURI ABADI</option>
                            <option value="215">HASRAT ANDA SEJAHTERA</option>
                            <option value="538">HASRAT INSAN NURANI</option>
                            <option value="216">HASTA INSAN PERKASA</option>
                            <option value="568">HEMA DUTA JASINDO</option>
                            <option value="217">HENDRARTA ARGA RAYA</option>
                            <option value="219">HEROTAMA INDONUSA</option>
                            <option value="1196">HIDAYAH INSAN PEKERJA</option>
                            <option value="220">HIJRAH AMAL PRATAMA</option>
                            <option value="571">HIKMAH SURYA JAYA</option>
                            <option value="621">HIKMAT AL ASAF</option>
                            <option value="222">HOSANA ADI KREASI</option>
                            <option value="223">HOSANA JASA PERSADA</option>
                            <option value="225">IFAN MARGATAMA</option>
                            <option value="226">IIN ERA SEJAHTERA</option>
                            <option value="691">INDAH ABADI</option>
                            <option value="227">INDODUTA SEMBADA</option>
                            <option value="796">INDOJAYA</option>
                            <option value="228">INDOKARSA GUNA BUANA</option>
                            <option value="464">INDONAKER MANDIRI</option>
                            <option value="996">INDONESIA SUKSES ABADI HUMAN RESURCE</option>
                            <option value="230">INDOSINMA MAHKOTA INDAH</option>
                            <option value="537">INDOTAK JAYA ABADI</option>
                            <option value="1198">INSAN KARYA MANDIRI UTAMA</option>
                            <option value="231">INSANI BHAKTI GEMILANG</option>
                            <option value="747">INSTRASCO KILAT</option>
                            <option value="554">INTAN AYU LESTARI</option>
                            <option value="787">INTER NUSA</option>
                            <option value="532">INTERSOLUSI INDONESIA</option>
                            <option value="232">INTI JAFFARINDO</option>
                            <option value="233">INTRA CARAKA</option>
                            <option value="632">IP JASINDO</option>
                            <option value="235">IPWIKON JASINDO</option>
                            <option value="576">IRFAN JAYA SAPUTRA</option>
                            <option value="259">ISTI JAYA MANDIRI</option>
                            <option value="1189">JABAPUTRA BINAWAN UNGGUL</option>
                            <option value="1003">JAFA INDO CORPORA</option>
                            <option value="778">JASA SAFIRA RAHMAT</option>
                            <option value="237">JASA SEJAHTERA BARUNGU</option>
                            <option value="238">JASATAMA DANA MANDIRI</option>
                            <option value="239">JASATAMA WIDYA PERKASA</option>
                            <option value="240">JASEBU PRIMA INTERNUSA</option>
                            <option value="241">JASMINDO OLAH BARKAT</option>
                            <option value="242">JATIM DUTA PEMBANGUNAN</option>
                            <option value="465">JATIM KRIDA UTAMA</option>
                            <option value="466">JATIM SUKSES KARYA BERSAMA</option>
                            <option value="244">JAUHARA PERDANA SATU</option>
                            <option value="245">JAVA EXPRESS UTAMA</option>
                            <option value="389">JAYA FRANS ABADI</option>
                            <option value="641">KABAS CHO</option>
                            <option value="246">KALTIM NUSA ETIKA</option>
                            <option value="573">kantor</option>
                            <option value="247">KARYA ANTAR BANGSA SEJATI</option>
                            <option value="248">KARYA BAHRINDO CIPTA</option>
                            <option value="249">KARYA MANPOWER SWAKARSA</option>
                            <option value="250">KARYA PESONA SUMBER REZEKI</option>
                            <option value="911">KARYA SEMESTA PERKASA</option>
                            <option value="252">KARYANANDA ADI PERTIWI</option>
                            <option value="251">KARYATAMA MITRA SEJATI</option>
                            <option value="254">KENSUR HUTAMA</option>
                            <option value="969">KENTJANA MERCU BUANA</option>
                            <option value="255">KHALID BARKAT</option>
                            <option value="1002">KHALIFAH FIRDAUS AULIA</option>
                            <option value="256">KHIDMAT EL KASAB</option>
                            <option value="257">KIJANG LOMBOK RAYA</option>
                            <option value="258">KOENDEL WARAS</option>
                            <option value="260">KOPERJANAS</option>
                            <option value="261">KOSINDO PRADIPTA</option>
                            <option value="262">KURNIA BINA RIZKI</option>
                            <option value="263">KURNIA SUMBER DUTA SEJAHTERA</option>
                            <option value="1233">LAATANSA LINTAS INTERNASIONAL</option>
                            <option value="265">LANSIMA</option>
                            <option value="556">LEMBAGA NON PJTKI</option>
                            <option value="266">LENTERA BUNGA BANGSA SEJATI</option>
                            <option value="267">LERES KAHURIPAN SEJATI</option>
                            <option value="268">LEYVI PERKASA BERSAUDARA</option>
                            <option value="269">LIA CENTRAL UTAMA</option>
                            <option value="270">LIMBAJAYA MITRA TAMA</option>
                            <option value="1194">LINTAS BENUA BERKAT ABADI</option>
                            <option value="271">LINTAS CAKRAWALA BUANA</option>
                            <option value="272">LITA KARYA BERSAMA</option>
                            <option value="506">LUCKY MITRA ABADI</option>
                            <option value="273">LUHUR ASA VRIMA</option>
                            <option value="543">MAHARANI TRI UTAMA MANDIRI</option>
                            <option value="1219">MAHAYANA BINA ANDHIKA</option>
                            <option value="552">MAHKOTA ULFAH SEJAHTERA</option>
                            <option value="994">MAJU PUTRA DEWANGGA</option>
                            <option value="278">MALINDO MITRA PERKASA</option>
                            <option value="279">MANGGA DUA MAHKOTA</option>
                            <option value="505">MANGUNJAYA PERKASA</option>
                            <option value="553">MANPOWER INDONESIA</option>
                            <option value="280">MARBA SAFAR INTISAR</option>
                            <option value="281">MARCORIA PUTRA</option>
                            <option value="516">MARDEL ANUGERAH INTERNASIONAL</option>
                            <option value="501">MARDEL MITRA GLOBAL</option>
                            <option value="284">MEGAH BUANA CITRA MASINDO</option>
                            <option value="468">MEGAH UTAMA KRIYA NUGRAHA</option>
                            <option value="285">MEKAR JAYA WANAYASA PUTRA</option>
                            <option value="861">MEKARJAYA</option>
                            <option value="469">MENARA TERAS BAHARI</option>
                            <option value="1215">MERCATOR SERVICE INDONESIA</option>
                            <option value="287">MIDEAST MANPOWER DEVELOPMENT</option>`  
                            <option value="1004">PT. ABADI MANDIRI INTERNATIONAL (PELAUT)</option>
                            <option value="1005">PT. ABDI KITA SEGARA (PELAUT)</option>
                            <option value="1006">PT. ABDI MARINE (PELAUT)</option>
                            <option value="1007">PT. ABIYASA PUTRA SAMUDRA (PELAUT)</option>
                            <option value="1008">PT. ADI CIPTA BANGUN MANDIRI (PELAUT)</option>
                            <option value="1009">PT. ADI MITRA SELARAS INTERNASIONAL</option>
                            <option value="1010">PT. ADINDA MARIO MANDIRI (PELAUT)</option>
                            <option value="1011">PT. ADNYANA (PELAUT)</option>
                            <option value="1012">PT. AILA SAMUDERA INDONESIA (PELAUT)</option>
                            <option value="1013">PT. AKPAR GSP INTERNATIONAL (PELAUT)</option>
                            <option value="1014">PT. ALINDA PRIMA SENTOSA (PELAUT)</option>
                            <option value="1015">PT. AMRINDA MARINE (PELAUT)</option>
                            <option value="1016">PT. ANTAI SAMUDRA (PELAUT)</option>
                            <option value="1017">PT. ANUGERAH BAHARI PACIFIC (PELAUT)</option>
                            <option value="1018">PT. ARRION MITRA BERSAMA (PELAUT)</option>
                            <option value="1019">PT. ASIA DUTA INTERNATIONAL (PELAUT NIAGA)</option>
                            <option value="1020">PT. ASIA SAMUDRA (PELAUT)</option>
                            <option value="1021">PT. AZRIGAH SEJAHTERA (PELAUT)</option>
                            <option value="1022">PT. BAHARI KRU MANAJEMEN (PELAUT)</option>
                            <option value="1023">PT. BAHARI SELAYAR MANDIRI (PELAUT)</option>
                            <option value="1024">PT. BAHTERA ANUGERAH SENTOSA (PELAUT)</option>
                            <option value="1025">PT. BAHTERA NIAGA INT (PELAUT)</option>
                            <option value="1026">PT. BAJA BAHTERAMAS SEGARA (PELAUT)</option>
                            <option value="1027">PT. BALI TRITUNGGAL PERKASA (PELAUT)</option>
                            <option value="1030">PT. BANYUSEWU SEGARA BERKAH (PELAUT)</option>
                            <option value="1031">PT. BARUNA JAYA BAHARI (PELAUT)</option>
                            <option value="1032">PT. BARUNA RAYA LOGISTICS INC (PELAUT)</option>
                            <option value="1033">PT. BERINGIN WIJAYA (PELAUT)</option>
                            <option value="1034">PT. BERJAYA BINTRANG SAMUDERA (PELAUT)</option>
                            <option value="1035">PT. BERKAT SUKSES MAKMUR SEJAHTERA</option>
                            <option value="1036">PT. BEVERLY AGENCY INDONESIA (PELAUT)</option>
                            <option value="1037">PT. BIMA SAMUDRA BAHARI (PELAUT)</option>
                            <option value="1038">PT. BINTANG MAJU SEJAHTERA (PELAUT)</option>
                            <option value="1039">PT. BINTANG TIMUR PINAESAAN (PELAUT)</option>
                            <option value="1040">PT. BINTANG TIMUR SPAININDO (PELAUT)</option>
                            <option value="1041">PT. BRAVO SIERRA INT. (PELAUT)</option>
                            <option value="1042">PT. BSM CREW SERVICE (PELAUT)</option>
                            <option value="1043">PT. CAHAYA BINTANG TIMUR (PELAUT)</option>
                            <option value="1044">PT. CAHAYA TUNAS INTI (PELAUT NIAGA)</option>
                            <option value="1045">PT. CAKRAWALA INDONESIA SEJAHTERA (PELAUT)</option>
                            <option value="1046">PT. CASA DEL MAR (PELAUT)</option>
                            <option value="1047">PT. CEMERLANG TUNGGAL INTINUSA (PELAUT)</option>
                            <option value="1048">PT. CEMERLANG TUNGGAL INTRI KARSA (PELAUT)</option>
                            <option value="1049">PT. CHANDRA BROTHERS (PELAUT)</option>
                            <option value="1050">PT. COSTA INDONESIA CONEKTION (PELAUT)</option>
                            <option value="1051">PT. DEWATA MARINE INDONESIA (PELAUT)</option>
                            <option value="1052">PT. DINDA BAHARI MAKMUR (PELAUT)</option>
                            <option value="1053">PT. DORON MARINDO (PELAUT)</option>
                            <option value="1054">PT. DWIDAYA EKA LESTARI (PELAUT)</option>
                            <option value="1055">PT. EMDECE MARINE (PELAUT)</option>
                            <option value="1056">PT. ENTRUS LESTARI INDONESIA (PELAUT)</option>
                            <option value="1057">PT. EPITERMA MAS IND</option>
                            <option value="1058">PT. ESA NAGA SAMUDRA (PELAUT)</option>
                            <option value="1059">PT. FARI ANUGRAH SENTOSA (PELAUT)</option>
                            <option value="1060">PT. FAST OFFSHORE INDONESIA (PELAUT)</option>
                            <option value="1061">PT. FUJI BUSSAN INDONESIA (PELAUT)</option>
                            <option value="1062">PT. GAFA SAMUDRA ABADI (PELAUT)</option>
                            <option value="1063">PT. GASY BALI (PELAUT)</option>
                            <option value="1064">PT. GEMMA PRATAMA OCEAN (PELAUT)</option>
                            <option value="1065">PT. GLORY OFFSHORE (PELAUT)</option>
                            <option value="1066">PT. GREEN MARINDO ABADI (PELAUT)</option>
                            <option value="1067">PT. HADI JAYA MAKMUR (PELAUT)</option>
                            <option value="1068">PT. HAFARA MUTIARA BUANA (PELAUT)</option>
                            <option value="1069">PT. HARINI ASRI BAHARI (PELAUT)</option>
                            <option value="1070">PT. HARINI DUTA AYU (PELAUT)</option>
                            <option value="1071">PT. HOTOJIMA TUNA INDONESIA (PELAUT)</option>
                            <option value="1072">PT. INDAH MEGAH SARI (PELAUT)</option>
                            <option value="1073">PT. INDO SELEKSI MAKMUR ABADI (PELAUT)</option>
                            <option value="1074">PT. INDO STAR SEJAHTERA (PELAUT NIAGA)</option>
                            <option value="1075">PT. INDOKRU PRATAMA SAMUDRA (PELAUT)</option>
                            <option value="1076">PT. INDO-LILLA NUSANTARA (PELAUT)</option>
                            <option value="1077">PT. INDOMARITIME MANAGEMENT (PELAUT)</option>
                            <option value="1078">PT. INDONESIA BULK CARRIER (PELAUT)</option>
                            <option value="1079">PT. INDONESIA NELAYAN BERSATU (PELAUT)</option>
                            <option value="1080">PT. INDOSPAIN MARINE SERVICE (PELAUT)</option>
                            <option value="1081">PT. INO-PAN ABADI (PELAUT)</option>
                            <option value="1082">PT. INTI SINAR PELANGI (PELAUT)</option>
                            <option value="1083">PT. JANGKAR ANUGRAH SEJAHTERA (PELAUT)</option>
                            <option value="1084">PT. JASA INTERNATIONAL MARITIM (PELAUT)</option>
                            <option value="1085">PT. JASINDO DUTA SEGARA (PELAUT)</option>
                            <option value="1086">PT. JAVA MARINA INTERNATIONAL (PELAUT)</option>
                            <option value="1087">PT. JEREMIAH OCEAN (PELAUT)</option>
                            <option value="1088">PT. JUE MAN HING INDONESIA (PELAUT)</option>
                            <option value="1089">PT. KARLWEI MULTI GLOBAL (PELAUT)</option>
                            <option value="1090">PT. KARUNIA BAHARI SAMUDRA (PELAUT)</option>
                            <option value="1091">PT. KARUNIA BAHTERA SAMUDRA (PELAUT)</option>
                            <option value="1092">PT. KARUNIA BERSAUDARA SEJAHTERA (PELAUT)</option>
                            <option value="1093">PT. KARYA SEJAHTERA PRATAMA (PELAUT)</option>
                            <option value="1095">PT. KARYA SEMESTA SEJAHTERA</option>
                            <option value="1096">PT. KARYA TETAP JAYA (PELAUT)</option>
                        	<option value="1097">PT. KEMALA BALI MULYA (PELAUT)</option>
                            <option value="1098">PT. KEMUNING BUNGA SEJATI</option>
                            <option value="1099">PT. KENCANA INSAN BAHARI (PELAUT)</option>
                            <option value="1100">PT. KESATUAN PELAUT INDONESIA (TKI PELAUT)</option>
                            <option value="1101">PT. KIMCO CITRA MANDIRI (PELAUT)</option>
                            <option value="1102">PT. KOINDO MARITIME POWER (PELAUT)</option>
                            <option value="1103">PT. KONSIUM PERUSAHAAN PENGAWAKAN KAPAL (CIMA)</option>
                            <option value="1104">PT. KOSHIN INDONESIA (PELAUT)</option>
                            <option value="1105">PT. KRAZU NUSANTARA (TKI SENDIRI)</option>
                            <option value="1106">PT. KUSUMA BAHARI JAYA (PELAUT)</option>
                            <option value="1107">PT. LAKEMBA PERKASA BAHARI (PEL)</option>
                            <option value="1108">PT. LAYA TIYANNA ICHSAN (TKI SENDIRI)</option>
                            <option value="1109">PT. LIBERTY BELLA RINEKA (PELAUT)</option>
                            <option value="1110">PT. LINS PETROTAMA ENERGI (PELAUT NIAGA)</option>
                            <option value="1111">PT. MADDICAH JAYA (PELAUT)</option>
                            <option value="1112">PT. MANDIRI ABADI SENTOSA (PELAUT)</option>
                            <option value="1113">PT. MAPAN ABADI (PELAUT)</option>
                            <option value="1114">PT. MAR ADENTRO (PELAUT)</option>
                            <option value="1115">PT. MARIANA PRATAMA (PELAUT)</option>
                            <option value="1116">PT. MARINA SARANA SERVICE (PELAUT)</option>
                            <option value="1117">PT. MARINDO JAYA ABADI (PELAUT)</option>
                            <option value="1118">PT. MARINE SUPPORT INDONESIA (PELAUT)</option>
                            <option value="1119">PT. MARINEROAD VALLEN ANGKASA (PELAUT)</option>
                            <option value="1120">PT. MEDIA MARITIM TEGAL (PELAUT)</option>
                            <option value="1121">PT. MELISINDO HEMIKA PRIMA (PELAUT)</option>
                            <option value="1122">PT. MERANTI MAGSAYSAY (PELAUT)</option>
                            <option value="1123">PT. MERANTI MARITIME (PELAUT)</option>
                            <option value="1124">PT. METEORS SERVIS MARINDO (PELAUT)</option>
                            <option value="1125">PT. MITRA SAMUDERA CAKTI (PELAUT)</option>
                            <option value="1126">PT. MORINI JAYA (PELAUT)</option>
                            <option value="1127">PT. MUSTIKA KAMI (PELAUT)</option>
                            <option value="1128">PT. MUTIARA JASA BAHARI (PELAUT)</option>
                            <option value="1129">PT. NAGASINDO RAYA NALELA (PELAUT)</option>
                            <option value="1130">PT. NORTH OCEANIK (PELAUT)</option>
                            <option value="1131">PT. NURINDO MANDIRI (PELAUT)</option>
                            <option value="1132">PT. OCEAN MASTER CREW MANAGEMENT (PELAUT)</option>
                            <option value="1133">PT. OCEANINDO PRIMA SARANA (PELAUT NIAGA)</option>
                            <option value="1134">PT. ORIZA SATIVA AGENCY (PELAUT)</option>
                            <option value="1135">PT. PALOMA SEJATI (PELAUT)</option>
                            <option value="1136">PT. PAMUTAWAR PRIMA PERKASA (PELAUT)</option>
                            <option value="1216">PT. PAN ASIA SERVISINDO</option>
                            <option value="1137">PT. PANCA KARSA MANDIRI SEJATI (PELAUT)</option>
                            <option value="1138">PT. PANCAR NIAGA INDONESIA (PELAUT)</option>
                            <option value="1139">PT. PELAYARAN TAJRI SAMUDRA (PELAUT)</option>
                            <option value="1140">PT. PERMATA PASIR PUTIH (PELAUT NIAGA)</option>
                            <option value="1141">PT. PILINDO MEGAH SELATAN (PELAUT)</option>
                            <option value="1142">PT. PIRAMID CREWING & MANNING SERV. (PELAUT NIAGA)</option>
                            <option value="1143">PT. RADHA AMRITA (PELAUT)</option>
                            <option value="1144">PT. RAFA GLOBAL MARINE (PELAUT)</option>
                            <option value="1145">PT. RATU OCEANIA RAYA BALI (PELAUT NIAGA)</option>
                            <option value="908">PT. Rayana Mangga Hina</option>
                            <option value="1146">PT. REKAYASA INDUSTRI (BUMN)</option>
                            <option value="1147">PT. RICO KUSUMAH BUDIMAN (PELAUT)</option>
                            <option value="1148">PT. RIFANO ANUGRAH SENTOSA (PELAUT)</option>
                            <option value="1149">PT. RONA PRATAMA CITRA ABADI (PELAUT)</option>
                            <option value="1150">PT. ROROTAN ANTAR NUSA (PELAUT)</option>
                            <option value="1151">PT. SAKANA JAYA (PELAUT)</option>
                            <option value="1152">PT. SAMUDERA INDONESIA (PELAUT)</option>
                            <option value="1153">PT. SAMUDERA INDONESIA SHIP M.</option>
                            <option value="1154">PT. SANDI GENESIS SAMUEL (PELAUT)</option>
                            <option value="1155">PT. SARI HARTA SAMUDERA (PELAUT)</option>
                            <option value="1156">PT. SEA FARINDO CREW MANAGEMENT (PELAUT)</option>
                            <option value="1157">PT. SEAMAN INDONESIA (PELAUT)</option>
                            <option value="1158">PT. SEMESTA AGUNG INSAN LESTARI SAMUDERA (PELAUT)</option>
                            <option value="1159">PT. SEVA JAYA BAHARI (PELAUT)</option>
                            <option value="1160">PT. SHAFAR ABADI INDONESIA (PELAUT)</option>
                            <option value="1161">PT. SHINWAYA PUTRA KARUNIA (PELAUT)</option>
                            <option value="1162">PT. SILLO BAHARI NUSANTARA (PELAUT)</option>
                            <option value="1163">PT. SINAR JAYA MAKMUR SENTOSA (PELAUT)</option>
                            <option value="1164">PT. SINAR PACIFIC (PELAUT)</option>
                            <option value="1165">PT. SOLOMINDO PACIFIC INTERNATIONAL (PELAUT)</option>
                            <option value="1166">PT. SRI BAHARI (PELAUT)</option>
                            <option value="1167">PT. SUKSES GRAHA SAMUDRA (PELAUT)</option>
                            <option value="1168">PT. SUMBER PUTRA ABADI (PELAUT)</option>
                            <option value="1169">PT. SURYA MITRA BAHARI (PELAUT)</option>
                            <option value="1170">PT. TANTO INTIM LINE (PELAUT)</option>
                            <option value="1172">PT. TENAGA BARU NUANSA PERSADA (PELAUT NIAGA)</option>
                            <option value="1173">PT. TENAGA SATU PERSADA (PELAUT)</option>
                            <option value="1174">PT. TITIAN BAHTERA SEGARA (PELAUT NIAGA)</option>
                            <option value="1175">PT. TKI PERORANGAN - MANDIRI - CUTI</option>
                            <option value="1176">PT. TOMAS JAYA PERKASA (PELAUT)</option>
                            <option value="1177">PT. TOP OCEAN PEOPLE (PELAUT)</option>
                            <option value="1178">PT. TRINANDA BAYO PERKASA (PELAUT)</option>
                            <option value="1179">PT. TRINANDA INDORECA (PELAUT)</option>
                            <option value="1180">PT. TUNGGAL JAYA PUTERA NASIONAL (PELAUT)</option>
                            <option value="1181">PT. VEKTOR MARITIM (PELAUT)</option>
                            <option value="1182">PT. WAHANA RAHMAH (PELAUT)</option>
                            <option value="1183">PT. WAHANA SAMUDERA INDONESIA (PELAUT)</option>
                            <option value="1184">PT. WANDA JAYA AMERTA (PELAUT)</option>
                            <option value="1185">PT. WIJAYA KARYA (TKI UTK KEPENTINGAN PERUSAHAAN SENDIRI)</option>
                            <option value="1186">PT. YOGA MUTIARA INDO (PELAUT)</option>
                            <option value="1187">PT. YUDIAN UNGGUL INDONESIA (PELAUT)</option>
                            <option value="1188">PT. YUTAKA ALAM SEGORO (PELAUT)</option>
                            <option value="341">PUNDI PUTRA INDOTAMA</option>
                            <option value="342">PUTRA AL IRSHAD MANDIRI</option>
                            <option value="343">PUTRA ALWINI</option>
                            <option value="1205">PUTRA ARGAM MANDIRI</option>
                            <option value="1214">PUTRA BRAGAS MANDIRI</option>
                            <option value="344">PUTRA DUTA PEMBANGUNAN</option>
                            <option value="1213">PUTRA HIDAYAH</option>
                            <option value="345">PUTRA INDO SEJAHTERA</option>
                            <option value="346">PUTRA JABUNG PERKASA</option>
                            <option value="499">PUTRA PARA UTAMA KARYA</option>
                            <option value="1212">PUTRA PERTIWI JAYA LESTARI</option>
                            <option value="490">PUTRA TIMUR MANDIRI</option>
                            <option value="651">PUTRI MAJU MANDIRI</option>
                            <option value="347">PUTRI MANDIRI ABADI</option>
                            <option value="1211">PUTRI NIL SEJATI</option>
                            <option value="539">PUTRI SAMAWA MANDIRI</option>
                            <option value="990">QAFCO</option>
                            <option value="348">RADESA GUNA PRIMA</option>
                            <option value="349">RAHANA KARINDO UTAMA</option>
                            <option value="350">RAHMAN PRATAMA SEJATI</option>
                            <option value="431">RAHMAT JASA SAFIRA</option>
                            <option value="549">RAHMAT MANDIRI PT.</option>
                            <option value="351">RAJANA FALAM PUTRI</option>
                            <option value="1192">RAMAH INDAH INDOHASTA</option>
                            <option value="353">RASTANURA RAYANI SAPUTRA</option>
                            <option value="354">RATNA PURI ABADI</option>
                            <option value="1238">REANG NOTO BERSAMA</option>
                            <option value="355">REKAWAHANA MULYA</option>
                            <option value="356">REKSATAMA PRASADA</option>
                            <option value="982">RESTU BUNDA SEJATI</option>
                            <option value="1210">RIHLAH ABADI</option>
                            <option value="357">RIMBA CIPTAAN INDAH</option>
                            <option value="1200">RIZALDY BINA BERSAMA</option>
                            <option value="976">RIZKA BERKAH GUNA</option>
                            <option value="358">ROSASENA PRIMA JAYA</option>
                            <option value="1234">RUDY</option>
                            <option value="359">RUYUNG KARYA MANDIRI</option>
                            <option value="360">SABIKA ARABINDO</option>
                            <option value="361">SABRINA PARAMITHA</option>
                            <option value="513">SAFANA MITRA UTAMA</option>
                            <option value="492">SAFARINDO INSAN CORPORA</option>
                            <option value="362">SAFIKA JAYA UTAMA</option>
                            <option value="363">SAFINA DAHAJAYA</option>
                            <option value="364">SAFIR AMAL SEJATI</option>
                            <option value="952">Sahabat Putra Pendawa</option>
                            <option value="365">SAHARA FAJARINDO CORP</option>
                            <option value="857">SAINA</option>
                            <option value="366">SAKINAH PYRAMIDA</option>
                            <option value="810">SALAMAN</option>
                            <option value="367">SALHA PUTRI TUNGGAL</option>
                            <option value="368">SALMAN PUTRA RAYANA</option>
                            <option value="369">SAMPEANG ALIFID MANDIRI</option>
                            <option value="371">SANGSURYA SENTOSA ABADI</option>
                            <option value="372">SANJAYA PUTERA PERKASA</option>
                            <option value="550">SANSAN YOSINDO</option>
                            <option value="373">SAPTA REZEKI</option>
                            <option value="374">SAPTA SAGUNA</option>
                            <option value="519">SARAH PRESSIA UTAMA</option>
                            <option value="557">SARANA INSAN MANDIRI</option>
                            <option value="821">SARANA KARYA PERTIWI</option>
                            <option value="522">SARCO</option>
                            <option value="375">SARI WARTI AGUNG</option>
                            <option value="376">SARIMADU JAYANUSA</option>
                            <option value="377">SATRIA PARANG TRITIS</option>
                            <option value="378">SEJAHTERA EKA PRATAMA</option>
                            <option value="379">SEKAR TANJUNG LESTARI</option>
                            <option value="380">SELONDANG MAYANG BESTARI</option>
                            <option value="381">SENDANG DAMAR SEMANGGIAGUNG</option>
                            <option value="382">SENTOSA KARYA ADITAMA</option>
                            <option value="998">SENTOSA KARYA MANDIRI</option>
                            <option value="383">SENTOSA PANCASAKTI</option>
                            <option value="384">SERE MULTI PERTIWI</option>
                            <option value="482">SERUMPUN MAJU BERSAMA</option>
                            <option value="704">SETIA</option>
                            <option value="385">SETIAMULIA KRIDATAMA</option>
                            <option value="528">SINAR BERLIAN MANDIRI</option>
                            <option value="483">SINAR HARAPAN ANDA</option>
                            <option value="386">SINAR INSANI BAROKAH</option>
                            <option value="387">SINAR KASIH SOROAKO</option>
                            <option value="555">SINAR MAKMUR JAYA</option>
                            <option value="1207">SINAR PUSAKA ABADI</option>
                            <option value="1217">SINERGI BINA KARYA</option>
                            <option value="1218">SODO SAKTI JAYA</option>
                            <option value="962">SOFIA INTERNATIONAL PERKASA</option>
                            <option value="970">SOFIA SUKSES SEJATI</option>
                            <option value="889">SRIFAN JAYA ABADI</option>
                            <option value="1223">SRIJATI GANDASARI</option>
                            <option value="390">SRITI RUKMA LESTARI</option>
                            <option value="391">SUDINAR ARTHA</option>
                            <option value="392">SUKAMULIA MANDIRI AGUNG</option>
                            <option value="393">SUKMA INSAN KAMIL</option>
                            <option value="394">SUKMA KARYA SEJATI</option>
                            <option value="1228">SUKSES BERSAMA YATFUARI</option>
                            <option value="1197">SUKSES DUA BERSAUDARA</option>
                            <option value="395">SUKSES MANDIRI UTAMA</option>
                            <option value="396">SUMA JAYA</option>
                            <option value="515">SUMBER BAKAT INSANI</option>
                            <option value="397">SUMBER DHARMA BHAKTI</option>
                            <option value="398">SUMBER KENCANA SEJAHTERA</option>
                            <option value="399">SUMBER MANUSIA RAJIN</option>
                            <option value="400">SUMBER TENAGA KERJA REMAJA ABADI</option>
                            <option value="526">SUPERINDO SEMESTA</option>
                            <option value="403">SURABAYA YUDHA CITRA PERDANA</option>
                            <option value="405">SURYA DUTA JASINDO</option>
                            <option value="406">SURYA JAYA UTAMA ABADI</option>
                            <option value="407">SURYA PACIFIC JAYA</option>
                            <option value="408">TAFCINDO JASATAMA SEGARA</option>
                            <option value="1203">TANGGUH MAKMUR SEJAHTERA</option>
                            <option value="761">TANJUNG PINANG</option>
                            <option value="409">TATA ATLAS MASTERINDO</option>
                            <option value="410">TEJA MUKTI UTAMA</option>
                            <option value="524">TENAGA SEJAHTERA WIRASTA</option>
                            <option value="412">TENRIAWARU INDAH ABADI</option>
                            <option value="413">TIARAMAS RONA GEMILANG</option>
                            <option value="414">TIFAR ADMANCO</option>
                            <option value="415">TIMUR RAYA JAYA LESTARI</option>
                            <option value="417">TISTAMA ARGARAYA</option>
                            <option value="418">TITIAN HIDUP LANGGENG</option>
                            <option value="419">TOTAL DATA PERSADA</option>
                            <option value="420">TRANS IWI</option>
                            <option value="421">TRI AKMI SENTOSA</option>
                            <option value="435">TRI GANDA SWAJAYA</option>
                            <option value="901">TRI TUNGGAL PUTRA</option>
                            <option value="424">TRIAS DUTA</option>
                            <option value="425">TRIAS INSAN MADANI</option>
                            <option value="183">TRIMULTI CITRA BAHARI</option>
                            <option value="184">TRISULA BINTANG MANDIRI</option>
                            <option value="185">TRITAMA BINA KARYA</option>
                            <option value="426">TRITAMA MEGAH ABADI</option>
                            <option value="186">TRITUNGGAL NUANSA PRIMATAMA</option>
                            <option value="187">TRIWIRA PERKASA</option>
                            <option value="547">TRIWIRA SEMESTA INDONESIA</option>
                            <option value="1229">TULUS WIDODO PUTRA</option>
                            <option value="188">UNI KARYA PANCA MUSTIKA</option>
                            <option value="189">USAHATAMA BUNDA SEJATI</option>
                            <option value="999">VITA MELATI INDONESIA</option>
                            <option value="191">WADILESAR JAYA</option>
                            <option value="192">WAHANA BAROKAH</option>
                            <option value="193">WAHANA KARYA SUPLAINDO</option>
                            <option value="628">WARDAH</option>
                            <option value="195">WINDU SARANA DEVELOPMENT</option>
                            <option value="196">WIRA KARITAS</option>
                            <option value="197">WIRA KREASI USAHA</option>
                            <option value="198">WIRA MATRA GUNA</option>
                            <option value="559">Y A S R I</option>
                            <option value="200">YALAKARYA RINTIS KRIDA</option>
                            <option value="477">YANBU AL BAHAR</option>
                            <option value="1190">YASRI</option>
                            <option value="535">YASTHA MANDIRI MANPOWER</option>
                            <option value="201">YONASINDO INTRA PRATAMA</option>
                            <option value="202">YOSA MITRA MANDIRI</option>
                            <option value="479">YOUMBA BIBA ABADI</option>
                            <option value="203">ZAMZAM PERWITA</option>
                            <option value="971">ZAYA ABADI EKASOGI</option>
                            <option value="1199">ZISRA DWI JAYA</option>

                        </select>
                        
                        <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let select = document.getElementById("perusahaan");
                            let options = Array.from(select.options);

                            // Urutkan berdasarkan teks
                            options.sort((a, b) => a.text.localeCompare(b.text));

                            // Hapus semua option lama
                            select.innerHTML = "";

                            // Tambahkan option yang sudah diurutkan
                            options.forEach(option => select.add(option));
                        });
                        </script>
                    </div>

                    <div class="md:col-span-1">
                        <label class="text-sm font-medium">Nama Majikan</label>
                        <input type="text" name="nama_majikan" class="form-input">
                    </div>
                </div>
                
                
        </div>

            {{-- ================= PIHAK YANG DIADUKAN ================= --}}
<div class="mb-10">
    <h4 style="font-size: 24px; font-family: Arial, sans-serif; font-weight: 600; text-align: center; margin-bottom: 2rem; letter-spacing: 0.05em;">
    PIHAK YANG DIADUKAN
</h4>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        {{-- TIPE TERLAPOR --}}
        <div class="md:col-span-1">
            <label class="text-sm font-medium">Tipe Terlapor</label>
        </div>
        <div class="md:col-span-3 flex items-center gap-6">
            <label class="flex items-center gap-2">
                <input type="radio" name="tipe_terlapor" value="Individu">
                Individu
            </label>
            <label class="flex items-center gap-2">
                <input type="radio" name="tipe_terlapor" value="Institusi">
                Institusi
            </label>
        </div>

        {{-- NAMA / PPTKIS --}}
        <div class="md:col-span-1">
            <label class="text-sm font-medium">Nama / PPTKIS</label>
        </div>
        <div class="md:col-span-3">
            <input type="text" name="nama_terlapor"
                   placeholder="Nama/PPTKIS yang diadukan"
                   class="form-input">
        </div>

        {{-- ALAMAT --}}
        <div class="md:col-span-1">
            <label class="text-sm font-medium">Alamat</label>
        </div>
        <div class="md:col-span-3">
            <input type="text" name="alamat_terlapor"
                   placeholder="Alamat yang diadukan"
                   class="form-input">
        </div>

        {{-- KONTAK --}}
        <div class="md:col-span-1">
            <label class="text-sm font-medium">Kontak</label>
        </div>
        <div class="md:col-span-3">
            <input type="text" name="kontak_terlapor"
                   placeholder="Kontak yang diadukan"
                   class="form-input">
        </div>

        {{-- KLASIFIKASI --}}
        <div class="md:col-span-1">
            <label class="text-sm font-medium">
                Kategori Pengaduan <span class="text-red-500">*</span>
            </label>
        </div>

<div class="md:col-span-3">
    <select name="klasifikasi_pengaduan" class="form-control" required>
    <option value="">-- Pilih Klasifikasi --</option>
    @foreach ($klasifikasi as $item)
        <option value="{{ $item->id }}">
            {{ $item->nama }}
        </option>
    @endforeach
</select>

</div>

       
        {{-- DESKRIPSI --}}
        <div class="md:col-span-1">
            <label class="text-sm font-medium">Deskripsi Permasalahan</label>
        </div>
        <div class="md:col-span-3">
            <textarea name="deskripsi_permasalahan"
                      placeholder="Deskripsi Permasalahan"
                      class="form-textarea h-32"></textarea>
        </div>

        {{-- TUNTUTAN --}}
        <div class="md:col-span-1">
            <label class="text-sm font-medium">Tuntutan</label>
        </div>
        <div class="md:col-span-3">
            <textarea name="tuntutan"
                      placeholder="Tuntutan"
                      class="form-textarea h-28"></textarea>
        </div>

        {{-- UPLOAD FILE --}}
        <div class="md:col-span-1">
            <label class="text-sm font-medium">Upload File Pendukung</label>
        </div>
        <div class="md:col-span-3">
            <input type="file" name="dokumen_pendukung"
                   accept=".pdf,.jpg,.jpeg,.png"
                   class="form-input">

            <p class="text-xs text-gray-500 mt-2">
                (Dijadikan 1 PDF ukuran Maks 2MB )
            </p>
        </div>

    </div>
</div>


            {{-- ================= ACTION ================= --}}
            <div class="flex justify-between border-t pt-6">
<a href="{{ route('admin.pengaduan.index') }}"
   class="px-6 py-2 border rounded">
    ← Kembali
</a>

                <button type="submit"
                        class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">
                    Kirim Pengaduan
                </button>
            </div>

        </form>

        {{-- ================= SCRIPT PROVINSI & KABUPATEN ================= --}}
        <script>
            const dataWilayah = {
    "Aceh": ["Kabupaten Aceh Barat","Kabupaten Aceh Barat Daya","Kabupaten Aceh Besar","Kabupaten Aceh Jaya","Kabupaten Aceh Selatan","Kabupaten Aceh Singkil","Kabupaten Aceh Tamiang","Kabupaten Aceh Tengah","Kabupaten Aceh Tenggara","Kabupaten Aceh Timur","Kabupaten Aceh Utara","Kabupaten Bener Meriah","Kabupaten Bireuen","Kabupaten Gayo Lues","Kabupaten Nagan Raya","Kabupaten Pidie","Kabupaten Pidie Jaya","Kabupaten Simeulue","Kota Banda Aceh","Kota Langsa","Kota Lhokseumawe","Kota Sabang","Kota Subulussalam"],
    "Sumatera Utara": ["Kabupaten Asahan","Kabupaten Batubara","Kabupaten Dairi","Kabupaten Deli Serdang","Kabupaten Humbang Hasundutan","Kabupaten Karo","Kabupaten Labuhanbatu","Kabupaten Labuhanbatu Selatan","Kabupaten Labuhanbatu Utara","Kabupaten Langkat","Kabupaten Mandailing Natal","Kabupaten Nias","Kabupaten Nias Barat","Kabupaten Nias Selatan","Kabupaten Nias Utara","Kabupaten Padang Lawas","Kabupaten Padang Lawas Utara","Kabupaten Pakpak Bharat","Kabupaten Samosir","Kabupaten Serdang Bedagai","Kabupaten Simalungun","Kabupaten Tapanuli Selatan","Kabupaten Tapanuli Tengah","Kabupaten Tapanuli Utara","Kabupaten Toba Samosir","Kota Binjai","Kota Gunungsitoli","Kota Medan","Kota Padangsidempuan","Kota Pematangsiantar","Kota Sibolga","Kota Tanjungbalai","Kota Tebing Tinggi"],
    "Sumatera Barat": ["Kabupaten Agam","Kabupaten Dharmasraya","Kabupaten Kepulauan Mentawai","Kabupaten Lima Puluh Kota","Kabupaten Padang Pariaman","Kabupaten Pasaman","Kabupaten Pasaman Barat","Kabupaten Pesisir Selatan","Kabupaten Sijunjung","Kabupaten Solok","Kabupaten Solok Selatan","Kabupaten Tanah Datar","Kota Bukittinggi","Kota Padang","Kota Padang Panjang","Kota Pariaman","Kota Payakumbuh","Kota Sawahlunto","Kota Solok"],
    "Riau": ["Kabupaten Bengkalis","Kabupaten Indragiri Hilir","Kabupaten Indragiri Hulu","Kabupaten Kampar","Kabupaten Kepulauan Meranti","Kabupaten Kuantan Singingi","Kabupaten Pelalawan","Kabupaten Rokan Hilir","Kabupaten Rokan Hulu","Kabupaten Siak","Kota Dumai","Kota Pekanbaru"],
    "Kepulauan Riau": ["Kabupaten Bintan","Kabupaten Karimun","Kabupaten Kepulauan Anambas","Kabupaten Lingga","Kabupaten Natuna","Kota Batam","Kota Tanjung Pinang"],
    "Jambi": ["Kabupaten Batanghari","Kabupaten Bungo","Kabupaten Kerinci","Kabupaten Merangin","Kabupaten Muaro Jambi","Kabupaten Sarolangun","Kabupaten Tanjung Jabung Barat","Kabupaten Tanjung Jabung Timur","Kabupaten Tebo","Kota Jambi","Kota Sungai Penuh"],
    "Sumatera Selatan": ["Kabupaten Banyuasin","Kabupaten Empat Lawang","Kabupaten Lahat","Kabupaten Muara Enim","Kabupaten Musi Banyuasin","Kabupaten Musi Rawas","Kabupaten Musi Rawas Utara","Kabupaten Ogan Ilir","Kabupaten Ogan Komering Ilir","Kabupaten Ogan Komering Ulu","Kabupaten Ogan Komering Ulu Selatan","Kabupaten Ogan Komering Ulu Timur","Kabupaten Penukal Abab Lematang Ilir","Kota Lubuklinggau","Kota Pagar Alam","Kota Palembang","Kota Prabumulih"],
    "Bengkulu": ["Kabupaten Bengkulu Selatan","Kabupaten Bengkulu Tengah","Kabupaten Bengkulu Utara","Kabupaten Kaur","Kabupaten Kepahiang","Kabupaten Lebong","Kabupaten Mukomuko","Kabupaten Rejang Lebong","Kabupaten Seluma","Kota Bengkulu"],
    "Bangka Belitung": ["Kabupaten Bangka","Kabupaten Bangka Barat","Kabupaten Bangka Selatan","Kabupaten Bangka Tengah","Kabupaten Belitung","Kabupaten Belitung Timur","Kota Pangkal Pinang"],
    "Lampung": ["Kabupaten Lampung Barat","Kabupaten Lampung Selatan","Kabupaten Lampung Tengah","Kabupaten Lampung Timur","Kabupaten Lampung Utara","Kabupaten Mesuji","Kabupaten Pesawaran","Kabupaten Pesisir Barat","Kabupaten Pringsewu","Kabupaten Tulang Bawang","Kabupaten Tulang Bawang Barat","Kabupaten Tanggamus","Kabupaten Way Kanan","Kota Bandar Lampung","Kota Metro"],
    "DKI Jakarta": ["Kabupaten Administrasi Kepulauan Seribu","Kota Administrasi Jakarta Barat","Kota Administrasi Jakarta Pusat","Kota Administrasi Jakarta Selatan","Kota Administrasi Jakarta Timur","Kota Administrasi Jakarta Utara"],
    "Jawa Barat": ["Kabupaten Bandung","Kabupaten Bandung Barat","Kabupaten Bekasi","Kabupaten Bogor","Kabupaten Ciamis","Kabupaten Cianjur","Kabupaten Cirebon","Kabupaten Garut","Kabupaten Indramayu","Kabupaten Karawang","Kabupaten Kuningan","Kabupaten Majalengka","Kabupaten Pangandaran","Kabupaten Purwakarta","Kabupaten Subang","Kabupaten Sukabumi","Kabupaten Sumedang","Kabupaten Tasikmalaya","Kota Bandung","Kota Banjar","Kota Bekasi","Kota Bogor","Kota Cimahi","Kota Cirebon","Kota Depok","Kota Sukabumi","Kota Tasikmalaya"],
    "Jawa Tengah": ["Kabupaten Banjarnegara","Kabupaten Banyumas","Kabupaten Batang","Kabupaten Blora","Kabupaten Boyolali","Kabupaten Brebes","Kabupaten Cilacap","Kabupaten Demak","Kabupaten Grobogan","Kabupaten Jepara","Kabupaten Karanganyar","Kabupaten Kebumen","Kabupaten Kendal","Kabupaten Klaten","Kabupaten Kudus","Kabupaten Magelang","Kabupaten Pati","Kabupaten Pekalongan","Kabupaten Pemalang","Kabupaten Purbalingga","Kabupaten Purworejo","Kabupaten Rembang","Kabupaten Semarang","Kabupaten Sragen","Kabupaten Sukoharjo","Kabupaten Tegal","Kabupaten Temanggung","Kabupaten Wonogiri","Kabupaten Wonosobo","Kota Magelang","Kota Pekalongan","Kota Salatiga","Kota Semarang","Kota Surakarta","Kota Tegal"],
    "DI Yogyakarta": ["Kabupaten Bantul","Kabupaten Gunungkidul","Kabupaten Kulon Progo","Kabupaten Sleman","Kota Yogyakarta"],
    "Jawa Timur": ["Kabupaten Bangkalan","Kabupaten Banyuwangi","Kabupaten Blitar","Kabupaten Bojonegoro","Kabupaten Bondowoso","Kabupaten Gresik","Kabupaten Jember","Kabupaten Jombang","Kabupaten Kediri","Kabupaten Lamongan","Kabupaten Lumajang","Kabupaten Madiun","Kabupaten Magetan","Kabupaten Malang","Kabupaten Mojokerto","Kabupaten Nganjuk","Kabupaten Ngawi","Kabupaten Pacitan","Kabupaten Pamekasan","Kabupaten Pasuruan","Kabupaten Ponorogo","Kabupaten Probolinggo","Kabupaten Sampang","Kabupaten Sidoarjo","Kabupaten Situbondo","Kabupaten Sumenep","Kabupaten Trenggalek","Kabupaten Tuban","Kabupaten Tulungagung","Kota Batu","Kota Blitar","Kota Kediri","Kota Madiun","Kota Malang","Kota Mojokerto","Kota Pasuruan","Kota Probolinggo","Kota Surabaya"],
    "Bali": ["Kabupaten Badung","Kabupaten Bangli","Kabupaten Buleleng","Kabupaten Gianyar","Kabupaten Jembrana","Kabupaten Karangasem","Kabupaten Klungkung","Kabupaten Tabanan","Kota Denpasar"],
    "Nusa Tenggara Barat": ["Kabupaten Bima","Kabupaten Dompu","Kabupaten Lombok Barat","Kabupaten Lombok Tengah","Kabupaten Lombok Timur","Kabupaten Lombok Utara","Kabupaten Sumbawa","Kabupaten Sumbawa Barat","Kota Bima","Kota Mataram"],
    "Nusa Tenggara Timur": ["Kabupaten Alor","Kabupaten Belu","Kabupaten Ende","Kabupaten Flores Timur","Kabupaten Kupang","Kabupaten Lembata","Kabupaten Malaka","Kabupaten Manggarai","Kabupaten Manggarai Barat","Kabupaten Manggarai Timur","Kabupaten Ngada","Kabupaten Nagekeo","Kabupaten Rote Ndao","Kabupaten Sabu Raijua","Kabupaten Sikka","Kabupaten Sumba Barat","Kabupaten Sumba Barat Daya","Kabupaten Sumba Tengah","Kabupaten Sumba Timur","Kabupaten Timor Tengah Selatan","Kabupaten Timor Tengah Utara","Kota Kupang"],
    "Kalimantan Barat": ["Kabupaten Bengkayang","Kabupaten Kapuas Hulu","Kabupaten Kayong Utara","Kabupaten Ketapang","Kabupaten Kubu Raya","Kabupaten Landak","Kabupaten Melawi","Kabupaten Mempawah","Kabupaten Sambas","Kabupaten Sanggau","Kabupaten Sekadau","Kabupaten Sintang","Kota Pontianak","Kota Singkawang"],
    "Kalimantan Tengah": ["Kabupaten Barito Selatan","Kabupaten Barito Timur","Kabupaten Barito Utara","Kabupaten Gunung Mas","Kabupaten Kapuas","Kabupaten Katingan","Kabupaten Lamandau","Kabupaten Murung Raya","Kabupaten North Barito","Kabupaten Pulang Pisau","Kabupaten Seruyan","Kabupaten Sukamara","Kota Palangka Raya"],
    "Kalimantan Selatan": ["Kabupaten Balangan","Kabupaten Banjar","Kabupaten Barito Kuala","Kabupaten Hulu Sungai Selatan","Kabupaten Hulu Sungai Tengah","Kabupaten Hulu Sungai Utara","Kabupaten Kotabaru","Kabupaten Tabalong","Kabupaten Tanah Laut","Kabupaten Tanah Bumbu","Kabupaten Tapin","Kota Banjarbaru","Kota Banjarmasin"],
    "Kalimantan Timur": ["Kabupaten Berau","Kabupaten Kutai Barat","Kabupaten Kutai Kartanegara","Kabupaten Kutai Timur","Kabupaten Mahakam Ulu","Kabupaten Paser","Kabupaten Penajam Paser Utara","Kota Balikpapan","Kota Bontang","Kota Samarinda"],
    "Kalimantan Utara": ["Kabupaten Bulungan","Kabupaten Malinau","Kabupaten Nunukan","Kabupaten Tana Tidung","Kota Tarakan"],
    "Sulawesi Utara": ["Kabupaten Bolaang Mongondow","Kabupaten Bolaang Mongondow Selatan","Kabupaten Bolaang Mongondow Timur","Kabupaten Bolaang Mongondow Utara","Kabupaten Kepulauan Sangihe","Kabupaten Kepulauan Talaud","Kabupaten Minahasa","Kabupaten Minahasa Selatan","Kabupaten Minahasa Tenggara","Kabupaten Minahasa Utara","Kota Bitung","Kota Kotamobagu","Kota Manado","Kota Tomohon"],
    "Gorontalo": ["Kabupaten Boalemo","Kabupaten Bone Bolango","Kabupaten Gorontalo","Kabupaten Gorontalo Utara","Kabupaten Pohuwato","Kota Gorontalo"],
    "Sulawesi Tengah": ["Kabupaten Banggai","Kabupaten Banggai Kepulauan","Kabupaten Banggai Laut","Kabupaten Buol","Kabupaten Donggala","Kabupaten Morowali","Kabupaten Morowali Utara","Kabupaten Parigi Moutong","Kabupaten Sigi","Kabupaten Tojo Una‑Una","Kota Palu"],
    "Sulawesi Barat": ["Kabupaten Majene","Kabupaten Mamasa","Kabupaten Mamuju","Kabupaten Pasangkayu","Kabupaten Polewali Mandar"],
    "Sulawesi Selatan": ["Kabupaten Bantaeng","Kabupaten Barru","Kabupaten Bone","Kabupaten Bulukumba","Kabupaten Enrekang","Kabupaten Gowa","Kabupaten Jeneponto","Kabupaten Kepulauan Selayar","Kabupaten Luwu","Kabupaten Luwu Timur","Kabupaten Luwu Utara","Kabupaten Maros","Kabupaten Pangkajene dan Kepulauan","Kabupaten Pinrang","Kabupaten Sidenreng Rappang","Kabupaten Sinjai","Kabupaten Soppeng","Kabupaten Takalar","Kabupaten Tana Toraja","Kabupaten Toraja Utara","Kabupaten Wajo","Kota Makassar","Kota Palopo","Kota Parepare"],
    "Sulawesi Tenggara": ["Kabupaten Bombana","Kabupaten Buton","Kabupaten Buton Selatan","Kabupaten Buton Tengah","Kabupaten Buton Utara","Kabupaten Konawe","Kabupaten Konawe Kepulauan","Kabupaten Konawe Selatan","Kabupaten Muna","Kabupaten Muna Barat","Kabupaten Wakatobi","Kota Bau-Bau","Kota Kendari"],
    "Maluku": ["Kabupaten Buru","Kabupaten Buru Selatan","Kabupaten Kepulauan Aru","Kabupaten Maluku Tengah","Kabupaten Maluku Tenggara","Kabupaten Maluku Tenggara Barat","Kabupaten Seram Bagian Barat","Kabupaten Seram Bagian Timur","Kota Tual","Kota Ambon"],
    "Maluku Utara": ["Kabupaten Halmahera Barat","Kabupaten Halmahera Tengah","Kabupaten Halmahera Timur","Kabupaten Halmahera Selatan","Kabupaten Halmahera Utara","Kabupaten Kepulauan Sula","Kabupaten Pulau Morotai","Kabupaten Taliabu","Kota Ternate","Kota Tidore Kepulauan"],
    "Papua": ["Kabupaten Asmat","Kabupaten Biak Numfor","Kabupaten Boven Digoel","Kabupaten Deiyai","Kabupaten Dogiyai","Kabupaten Intan Jaya","Kabupaten Jayapura","Kabupaten Jayawijaya","Kabupaten Keerom","Kabupaten Kepulauan Yapen","Kabupaten Lanny Jaya","Kabupaten Mamberamo Raya","Kabupaten Mamberamo Tengah","Kabupaten Mapia","Kabupaten Mimika","Kabupaten Nduga","Kabupaten Paniai","Kabupaten Pegunungan Bintang","Kabupaten Puncak","Kabupaten Puncak Jaya","Kabupaten Sarmi","Kabupaten Supiori","Kabupaten Tolikara","Kabupaten Waropen","Kabupaten Yalimo","Kota Jayapura"],
    "Papua Barat": ["Kabupaten Fakfak","Kabupaten Kaimana","Kabupaten Manokwari","Kabupaten Manokwari Selatan","Kabupaten Maybrat","Kabupaten Pegunungan Arfak","Kabupaten Sorong","Kabupaten Sorong Selatan","Kabupaten Tambrauw","Kabupaten Teluk Bintuni","Kabupaten Teluk Wondama","Kota Sorong"],
    "Papua Selatan": ["Kabupaten Boven Digoel","Kabupaten Mappi","Kabupaten Merauke","Kabupaten Asmat","Kabupaten Bintang","Kabupaten Kepulauan Yapen","Kota Merauke"],
    "Papua Tengah": ["Kabupaten Nabire","Kabupaten Paniai","Kabupaten Mimika","Kabupaten Deiyai","Kabupaten Intan Jaya","Kabupaten Puncak Jaya","Kota Nabire"],
    "Papua Pegunungan": ["Kabupaten Jayawijaya","Kabupaten Lanny Jaya","Kabupaten Tolikara","Kabupaten Yalimo","Kabupaten Pegunungan Bintang","Kabupaten Deiyai","Kota Wamena"],
    "Papua Barat Daya": ["Kabupaten Maybrat","Kabupaten Sorong","Kabupaten Sorong Selatan","Kabupaten Tambrauw","Kabupaten South Sorong","Kabupaten Maybrat Selatan","Kota Sorong"]
};


            const provinsiSelect = document.getElementById('provinsi');
            const kabupatenSelect = document.getElementById('kabupaten');

            Object.keys(dataWilayah).forEach(p => {
                provinsiSelect.innerHTML += `<option value="${p}">${p}</option>`;
            });

            provinsiSelect.addEventListener('change', function () {
                const provinsi = this.value;
                kabupatenSelect.innerHTML = '<option value="">-- Pilih Kabupaten / Kota --</option>';

                if (provinsi && dataWilayah[provinsi]) {
                    kabupatenSelect.disabled = false;
                    dataWilayah[provinsi].forEach(kab => {
                        kabupatenSelect.innerHTML += `<option value="${kab}">${kab}</option>`;
                    });
                } else {
                    kabupatenSelect.disabled = true;
                }
            });
        </script>

    </div>
</div>
@endsection
