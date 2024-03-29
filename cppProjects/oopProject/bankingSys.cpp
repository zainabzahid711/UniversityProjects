#include <iostream>
using namespace std;

// in this program I covered composition concept
// composition class follows has-a relationship while inheritance follows is-a relationship
// abstract class concept, encapsulation is also provided by the composition class
// inheritance concept is also covered but a single inheritance
class AccountManage
{
    // abstract class don't have any instances
    // it should have one pure virtual function
    // at interface only you can see the btns to add to see to withdraw etc;
public:
    // default constructor
    AccountManage() {}
    virtual void AccountStatus() const = 0;
    virtual void toDeposite(double amount) = 0;
    virtual void toWithDraw(double amount) = 0;
    virtual void toSend(double amount) = 0;
    virtual void toRecieve(double amount) = 0;
    virtual ~AccountManage() {} // destructor
};

// composition class to encapsulate amount and balance

class Wallet
{
private:
    double amount;
    double balance;

public:
    Wallet(double Amount = 0) : amount(Amount), balance(0){};
    double getBalance() const
    {
        return balance;
    }
    double getAmount() const
    {
        return amount;
    }
    void deposite(double depositAmount)
    {
        amount = depositAmount;
        balance += amount;
    }
    void withDraw(double withDrawAmount)
    {
        amount = withDrawAmount;
        if (amount <= balance)
        {
            balance -= amount;
        }
        else
        {
            cout << "insufficient balance _" << endl;
        }
    }
};

class UserInfo : public AccountManage
{
private:
    string name;
    string adress;
    string accountNum;
    Wallet wall;

public:
    UserInfo(const string &Name, const string &Address, const string &accNumber, double balance) : name(Name), adress(Address), accountNum(accNumber), wall(balance){};
    void AccountStatus() const override
    {
        cout << "----- Your BankAccount Details ------ \n";
        cout << "Name : zainab zahid farooq ---- \n"
             << "Adress: Lahore Pakistan ---- \n"
             << "AccountNumber: PK36 ABCD 0000 0011 2345 6702 ---- \n"
             << "and your current balance is == " << wall.getBalance() << endl;
    }
    // transections
    //  deposit == entry , withdraw , recieve , send
    void toDeposite(double amount) override
    {
        wall.deposite(amount);
        cout << "entry successfull ..." << endl;
    }
    void toWithDraw(double amount) override
    {
        wall.withDraw(amount);
    }
    void toSend(double amount)
    {
        wall.withDraw(amount);
        cout << "sent successfully ..." << endl;
    }
    void toRecieve(double amount)
    {
        wall.deposite(amount);
        cout << "received " << amount << " successfully ..." << endl;
    }
};

int main()
{
    int value = 0;
    // AccountManage *acc = new UserInfo();
    UserInfo user("zainab zahid", "lahore Pakistan", "PK36 ABCD 0000 0011 2345 6702", 0);
    do
    {

        cout << " ---------- Account Details --------- \n";
        cout << "enter 1 to check your balance \n"
             << "enter 2 to deposite \n"
             << "enter 3 to withdraw \n"
             << "enter 4 to send \n"
             << "enter 5 to recieve \n"
             << "enter 6 to exit \n";

        cout << "Enter your choice _";
        cin >> value;
        switch (value)
        {

        case 1:
            user.AccountStatus();
            break;
        case 2:
            double depositAmount;
            cout << "enter amount to deposit _";
            cin >> depositAmount;
            user.toDeposite(depositAmount);
            break;
        case 3:
            double withDrawAmount;
            cout << "enter amount to withdraw _ ";
            cin >> withDrawAmount;
            user.toWithDraw(withDrawAmount);
            break;
        case 4:
            double sentAmount;
            cout << "enter amount to Sent _ ";
            cin >> sentAmount;

            user.toSend(sentAmount);
            break;
        case 5:
            double recAmount;
            cout << "enter amount to recieve _ ";
            cin >> recAmount;
            user.toRecieve(recAmount);
            break;
        default:
            cout << "invalid choice _" << endl;
            break;
        }
    } while (value != 6 && value != 0);
}
