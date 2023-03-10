package com.example.upsaalert;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseAuthUserCollisionException;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.messaging.FirebaseMessaging;

import java.util.HashMap;

public class RegisterActivity extends AppCompatActivity {
    FirebaseAuth mAuth;
    private EditText uemail, upass, useid, username;
    private Button lbtn;
    private ProgressBar progressBar;
    private TextView signupher;
    DatabaseReference reference;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
       // getSupportActionBar().setTitle("User Registeration");
        getSupportActionBar().hide();
        setContentView(R.layout.activity_register);
        mAuth = FirebaseAuth.getInstance();
        uemail = (EditText) findViewById(R.id.uemail);
        upass = (EditText) findViewById(R.id.upass);
        lbtn = (Button) findViewById(R.id.SignUpbtn);
        useid = (EditText) findViewById(R.id.userid);
        username = (EditText) findViewById(R.id.usern);
        progressBar = (ProgressBar) findViewById(R.id.progressBar3);
        signupher = (TextView) findViewById(R.id.signup);
        progressBar.setVisibility(View.INVISIBLE);


        //user Signup
        lbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                progressBar.setVisibility(View.VISIBLE);
                String uemails = uemail.getText().toString().trim();
                String Upasswrd = upass.getText().toString().trim();
                String uid = useid.getText().toString();

                if (uemails.isEmpty() || Upasswrd.isEmpty() || uid.isEmpty()){
                    if(uemails.isEmpty()){
                        uemail.setError("Email Cant Be Empty");
                        uemail.requestFocus();
                    }if(Upasswrd.isEmpty()){
                        upass.setError("Password Cant Be Empty");
                        upass.requestFocus();
                    }if(uid.isEmpty()){
                        useid.setError("Student ID Cant be Empty");
                        useid.requestFocus();
                    }

                    return;
                }

                mAuth.createUserWithEmailAndPassword(uemails,Upasswrd).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        if(task.isSuccessful()){
                            FirebaseUser user = mAuth.getCurrentUser();
                            String userid = user.getUid();
                            reference = FirebaseDatabase.getInstance().getReference("users").child(userid);
                            HashMap<String, Object> hash = new HashMap<>();
                            hash.put("id",userid);
                            hash.put("username",username.getText().toString());
                            hash.put("studentid",useid.getText().toString());
                            hash.put("imageurl","default");
                            hash.put("email",uemail.getText().toString());
                            hash.put("token","key");
                            reference.setValue(hash).addOnCompleteListener(new OnCompleteListener<Void>() {
                                @Override
                                public void onComplete(@NonNull Task<Void> task) {
                                    if (task.isSuccessful()){
                                        progressBar.setVisibility(View.INVISIBLE);
                                        Toast.makeText(RegisterActivity.this, "User Registered Successfully", Toast.LENGTH_SHORT).show();
                                        Intent intent = new Intent(RegisterActivity.this,MainActivity.class);
                                        intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK | Intent.FLAG_ACTIVITY_NEW_TASK);
                                        startActivity(intent);
                                        finish();
                                    }
                                }
                            });
                        }else{
                            if (task.getException() instanceof FirebaseAuthUserCollisionException){
                                //If Email Exist User Login
                                Toast.makeText(RegisterActivity.this, "Email Already Exit", Toast.LENGTH_SHORT).show();
                            }else{
                                progressBar.setVisibility(View.INVISIBLE);
                                Toast.makeText(RegisterActivity.this, ""+task.getException().getMessage(), Toast.LENGTH_SHORT).show();
                            }
                        }
                    }
                });
            }
        });

        //Login Page of You Dont Have An Account
        signupher.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(RegisterActivity.this,LoginActivity.class));
            }
        });
    }

    @Override
    protected void onStart() {
        super.onStart();
        if (mAuth.getCurrentUser() != null){
            finish();
            startActivity(new Intent(RegisterActivity.this,LoginActivity.class));
        }
    }
}
