use std::env;

fn main() {
    // Mengambil argumen yang dikirim oleh PHP
    let args: Vec<String> = env::args().collect();
    
    if args.len() > 1 {
        let input = &args[1];
        // Membalikkan string menggunakan Rust
        let reversed: String = input.chars().rev().collect();
        println!("{}", reversed);
    } else {
        println!("Sediakan teks yang ingin dibalik!");
    }
}
