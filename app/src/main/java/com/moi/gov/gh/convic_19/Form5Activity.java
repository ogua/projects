package com.moi.gov.gh.convic_19;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.CheckBox;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Spinner;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.snackbar.Snackbar;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.HashMap;
import java.util.Objects;

public class Form5Activity extends AppCompatActivity {

    private int mYear, mMonth, mDay, mHour, mMinute;
    String code;

    //Occupation
    private CheckBox student,healthwrk,wrkanimals,healthlab;
    //ocuupation others
    private EditText otherspecify;


    //Travel within 14
    private Spinner travehis;
    //if yes
    private EditText spcplacencity;




    //patient visited healthcare facility
    private Spinner haspavisi;


    //patient has in contact
    private Spinner conatctt;
    //if yes conatct settings
    private CheckBox homesett,healthcaresett,wrkplace,unknw;
    //contact setting others
    private EditText contcsetting;



    //contact probable or confirmed
    private  Spinner contprob;
    //if yes list them
    private EditText contactyes;



    //if yes Contact settings
    private CheckBox chomesett,chealthcaresett,cwrkplace,cunknw;
    // contact other specify
    private EditText ccontcsetting;

    //if location and city
    private EditText loccofospo;


    //lianimal
    private Spinner lieanimal;

    private FirebaseAuth mAuth;
    private DatabaseReference reference;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_form5);
        mAuth = FirebaseAuth.getInstance();

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        Objects.requireNonNull(getSupportActionBar()).setTitle("");
        Objects.requireNonNull(getSupportActionBar()).setDisplayHomeAsUpEnabled(true);


        //Occupation
        student = (CheckBox) findViewById(R.id.student);
        healthwrk = (CheckBox) findViewById(R.id.healthwrk);
        wrkanimals = (CheckBox) findViewById(R.id.wrkanimals);
        healthlab = (CheckBox)findViewById(R.id.healthlab);
        //occupation others
        otherspecify = (EditText) findViewById(R.id.otherspecify);


        //travel
        travehis = (Spinner) findViewById(R.id.travehis);
        //if yes
        spcplacencity = (EditText) findViewById(R.id.spcplacencity);


        //patient visited healthcare facility
        haspavisi = (Spinner) findViewById(R.id.haspavisi);



        //patient has in contact
        conatctt = (Spinner) findViewById(R.id.conatctt);
        //if yes conatct settings
        homesett = (CheckBox) findViewById(R.id.homesett);
        healthcaresett = (CheckBox) findViewById(R.id.healthcaresett);
        wrkplace = (CheckBox) findViewById(R.id.wrkplace);
        unknw = (CheckBox) findViewById(R.id.unknw);
        //contact setting others
        contcsetting = (EditText) findViewById(R.id.contcsetting);


        //contact probable or confirmed
        contprob = (Spinner) findViewById(R.id.contprob);

        //if yes list them
        contactyes = (EditText) findViewById(R.id.contactyes);


        //if yes Contact settings
        chomesett = (CheckBox) findViewById(R.id.chomesett);
        chealthcaresett = (CheckBox) findViewById(R.id.chealthcaresett);
        cwrkplace = (CheckBox) findViewById(R.id.cwrkplace);
        cunknw = (CheckBox) findViewById(R.id.cunknw);
        //conatct other specify
        ccontcsetting = (EditText) findViewById(R.id.ccontcsetting);


        //if location nad City
        loccofospo = (EditText) findViewById(R.id.loccofospo);


        //conatct with animal
        lieanimal = (Spinner) findViewById(R.id.lieanimal);








    }

    public void SaveandContinue(final View view) {
        final ProgressDialog pd = new ProgressDialog(this);
        pd.setMessage("Please Wait..");
        pd.show();




        String Occupation;
        String patoccupation = student.getText().toString().trim().concat(" "+healthwrk.getText().toString().trim()).concat(" "+wrkanimals.getText().toString().trim())
                .concat(" "+healthlab.getText().toString().trim()).concat(" "+otherspecify.getText().toString().trim());

        if (patoccupation.isEmpty()){
            Occupation = otherspecify.getText().toString().trim();
        }else{
            Occupation =  patoccupation;
        }



        String pattrave = travehis.getSelectedItem().toString();
        String ifyestravel = spcplacencity.getText().toString().trim();


        String healthacers = haspavisi.getSelectedItem().toString();
        String hascotact = conatctt.getSelectedItem().toString();


        String conatctsetiing;
        String consetting = homesett.getText().toString().trim().concat(" "+healthcaresett.getText().toString()).concat(" "+wrkplace.getText().toString().trim())
                .concat(" "+unknw.getText().toString());

        if (consetting.isEmpty()){
            conatctsetiing = contcsetting.getText().toString().trim();
        }else{
            conatctsetiing = consetting;
        }



        String contactpro = contprob.getSelectedItem().toString();
        String listifyes = contactyes.getText().toString().trim();



        String Contactsetting;
        String consettings = chomesett.getText().toString().trim().concat(" "+chealthcaresett.getText().toString().trim())
                .concat(" "+cwrkplace.getText().toString().trim()).concat(" "+cunknw.getText().toString().trim());

        if (consettings.isEmpty()){
            Contactsetting = ccontcsetting.getText().toString().trim();
        }else{
            Contactsetting = consettings;
        }


        //ifyes
        String locncity = loccofospo.getText().toString().trim();
        String lieimal = lieanimal.getSelectedItem().toString();



        FirebaseUser firebaseUser = mAuth.getCurrentUser();
        String fusreid = firebaseUser.getUid();

        String key = FirebaseDatabase.getInstance().getReference("Travel").push().getKey();
        reference = FirebaseDatabase.getInstance().getReference("Travel").child(key);
        HashMap<String, String> hashMap = new HashMap<>();
        hashMap.put("id",fusreid);
        hashMap.put("key",key);
        hashMap.put("Poccupation",patoccupation);
        hashMap.put("Ppatravel",pattrave);
        hashMap.put("pcountryncity",ifyestravel);
        hashMap.put("PatvistedHealthcare",healthacers);
        hashMap.put("pathasclosecontact",hascotact);
        hashMap.put("patoontactsettings",conatctsetiing);
        hashMap.put("patcontactprobable",contactpro);
        hashMap.put("patproifyes",listifyes);
        hashMap.put("patconatctsettings",Contactsetting);
        hashMap.put("patlocncity",locncity);
        hashMap.put("patcontactanimal",lieimal);
        hashMap.put("date",getCurrentdate());
        hashMap.put("eipnumber", code);

        reference.setValue(hashMap).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                if (task.isSuccessful()){
                    pd.hide();
                    Snackbar.make(view, "Data Captured Successfully!", Snackbar.LENGTH_LONG).show();
                    startActivity(new Intent(Form5Activity.this, DisplayBarcodeActivity.class));
                    overridePendingTransition(R.anim.slide_in_right,R.anim.stay);
                }else {
                    pd.hide();
                    Snackbar.make(view, "Data Capturing Failed! Try Again!", Snackbar.LENGTH_LONG).show();
                }
            }
        });

    }

    public String getCurrentdate() {
        DatePicker picker = new DatePicker(this);
        StringBuilder builder = new StringBuilder();
        builder.append(picker.getYear()+"-");
        builder.append((picker.getMonth() + 1)+"-");
        builder.append(picker.getDayOfMonth());
        return builder.toString();
    }




    public void skipfomr(View view) {
        startActivity(new Intent(Form5Activity.this, DisplayBarcodeActivity.class));
        overridePendingTransition(R.anim.slide_in_right,R.anim.stay);
    }


    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
            case android.R.id.home:
                startActivity(new Intent(this,Form4Activity.class));
                overridePendingTransition(R.anim.slide_in_left,android.R.anim.slide_out_right);
                break;
        }
        return super.onOptionsItemSelected(item);
    }


}
