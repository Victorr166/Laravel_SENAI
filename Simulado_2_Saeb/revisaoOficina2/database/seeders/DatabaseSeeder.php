<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            ['nome'=>'Administrador','email'=>'admin@oficina.com','senha'=>Hash::make('123456'),'created_at'=>now(),'updated_at'=>now()],
            ['nome'=>'Atendente','email'=>'atendente@oficina.com','senha'=>Hash::make('123456'),'created_at'=>now(),'updated_at'=>now()],
            ['nome'=>'Gerente','email'=>'gerente@oficina.com','senha'=>Hash::make('123456'),'created_at'=>now(),'updated_at'=>now()],
        ]);
        foreach ([['João Silva','11111111111','11999990001','joao@email.com'],['Maria Santos','22222222222','11999990002','maria@email.com'],['Pedro Oliveira','33333333333','11999990003','pedro@email.com']] as $c) {
            DB::table('clientes')->insert(['nome'=>$c[0],'cpf'=>Crypt::encryptString($c[1]),'telefone'=>$c[2],'email'=>$c[3],'created_at'=>now(),'updated_at'=>now()]);
        }
        foreach ([['Fiat','Uno','ABC1D23',2015,1],['Honda','Civic','DEF4G56',2020,2],['Volkswagen','Gol','HIJ7K89',2018,3]] as $v) {
            DB::table('veiculos')->insert(['marca'=>$v[0],'modelo'=>$v[1],'placa'=>$v[2],'ano'=>$v[3],'cliente_id'=>$v[4],'created_at'=>now(),'updated_at'=>now()]);
        }
        foreach ([['2026-11-20','08:00:00','Troca de óleo',1],['2026-11-21','09:00:00','Revisão',2],['2026-11-22','10:00:00','Alinhamento',3]] as $a) {
            DB::table('agendamentos')->insert(['data'=>$a[0],'hora'=>$a[1],'descricao'=>$a[2],'veiculo_id'=>$a[3],'created_at'=>now(),'updated_at'=>now()]);
        }
    }
}
