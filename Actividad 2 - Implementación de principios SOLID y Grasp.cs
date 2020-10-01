//Principio de Responsabilidad Única
// Esto no viola el principio de responsabilidad única al abstraer el Registro.

class Usuario
{
    private Registro_Archivo Registro = new Registro_Archivo();
    void Add(Database db)
    {
        try {
            db.Add();
        }
        catch (Exception ex)
        {
            logger.Handle(ex.ToString());
        }
    }
}
class Registro_Archivo
{
    void Handle(string error)
    {
        File.WriteAllText(@"C:\Issue.txt", error);
    }
}


//Principio de Abierto o Cerrado
//Más fácil de extender y más dificl de modificar

class CustomerBetter
{
    void Add(Database db)
    {
        db.Add();
    }
}

class ExistingCustomer : CustomerBetter
{
    override void Add(Database db)
    {
        db.AddExistingCustomer();
    }
}

class AnotherCustomer : CustomerBetter
{
    override void Add(Database db)
    {
        db.AnotherExtension();
    }
}


