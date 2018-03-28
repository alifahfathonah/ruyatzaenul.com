<?php

namespace App\Services;

use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Helper\ProgressBar;

use DB;
use Hash;
use App\Models\Berita;
use App\Models\SupportingDoc;

class Migrator
{
    public function dokumenakademik()
    {
      $db = DB::connection('oldccit');
      $akademikdoc = $db->table('akademik')->get();

      $console = new ConsoleOutput();

      $progress = new ProgressBar($console, count($akademikdoc));
      $progress->setOverwrite(true);
      $progress->setRedrawFrequency(1);

      foreach ($akademikdoc as $key) {
        try {
          if ($key->category=="Rules" || $key->category=="Download") {
            $set = new SupportingDoc;
            $set->title = $key->title;
            $set->desc = $key->title;
            $set->save();
          }

          $progress->advance();
        } catch (Exception $ex) {
          $progress->clear();
          $console->writeln($ex->getMessage());
          $progress->display();
        }
      }

      $progress->finish();
      $console->writeln('');
      $console->writeln('DONE!!');
    }

    public function berita()
    {
      $db = DB::connection('oldccit');
      $oldberita = $db->table('berita')->get();

      $console = new ConsoleOutput();

      $progress = new ProgressBar($console, count($oldberita));
      $progress->setOverwrite(true);
      $progress->setRedrawFrequency(1);

      foreach ($oldberita as $key) {
        try {
          $judul = $key->judul;
          $isi = $key->isi;
          $tanggal = $key->tanggal;

          $set = new Berita;
          $set->title = $judul;
          $set->desc = $isi;
          $set->file = null;
          $set->id_kategori = 1;
          $set->id_user = 1;
          $set->created_at = $tanggal;
          $set->updated_at = $tanggal;
          $set->save();

          $progress->advance();
        } catch (Exception $ex) {
          $progress->clear();
          $console->writeln($ex->getMessage());
          $progress->display();
        }
      }

      $progress->finish();
      $console->writeln('');
      $console->writeln('DONE!!');
    }

}
