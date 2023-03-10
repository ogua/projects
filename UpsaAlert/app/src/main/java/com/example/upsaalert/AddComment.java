package com.example.upsaalert;

import android.content.Intent;
import android.os.StrictMode;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.upsaalert.model.CommentAdapter;
import com.example.upsaalert.model.Comments;
import com.example.upsaalert.model.Users;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class AddComment extends AppCompatActivity {
    private Button btn;
    private EditText cmdt;
    private RequestQueue mRequestQueue;
    private StringRequest mStringRequest;
    private String urls = "http://192.168.43.141/AndroidPhp/AddComment.php";
    private String updateurl = "http://192.168.43.141/AndroidPhp/updateComment.php";
    private FirebaseAuth mAuth;
    DatabaseReference reference;
    String name;
    String imgurl;
    private ProgressBar progressBar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getSupportActionBar().setTitle("Add Comments");
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        setContentView(R.layout.activity_add_comment);
        mAuth = FirebaseAuth.getInstance();
        if (android.os.Build.VERSION.SDK_INT > 9)
        {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        btn = (Button) findViewById(R.id.cmntbtn);
        cmdt = (EditText) findViewById(R.id.cmtext);
        progressBar = (ProgressBar) findViewById(R.id.progressBar6);
        progressBar.setVisibility(View.INVISIBLE);

        FirebaseUser user = mAuth.getCurrentUser();
        reference = FirebaseDatabase.getInstance().getReference("users").child(user.getUid());
        reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                Users users = dataSnapshot.getValue(Users.class);
                name = users.getUsername();
                imgurl = users.getImageurl();

                if (users.getImageurl().equals("default")){

                }else {
                   String evenid = getIntent().getStringExtra("commtid");
                   UpdateComments(evenid,imgurl);
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String commt = cmdt.getText().toString().trim();
                String eventid = getIntent().getStringExtra("commtid");
                if(commt.isEmpty()){
                    cmdt.setError("Comment Cant Be Empty");
                    cmdt.requestFocus();
                }else{
                    InsertComment(eventid,commt,name,imgurl);
                }
            }
        });
    }

    private void UpdateComments(String evenid, String imgurl) {
       /* FirebaseUser user = mAuth.getCurrentUser();
        DatabaseReference reference = FirebaseDatabase.getInstance().getReference("");
        HashMap<String, Object> hashMap = new HashMap<>();
        hashMap.put("Eventid",evenid);
        reference.updateChildren(hashMap);*/
    }

    public String getCurrentdate() {
        DatePicker picker = new DatePicker(this);
        StringBuilder builder = new StringBuilder();
        builder.append((picker.getMonth() + 1)+"/");
        builder.append(picker.getDayOfMonth() +"/");
        builder.append(picker.getYear());
        return builder.toString();
    }

    private void InsertComment(String eventid, String commt, String name, String imgurl) {
        progressBar.setVisibility(View.VISIBLE);
        FirebaseUser user = mAuth.getCurrentUser();
        String key = FirebaseDatabase.getInstance().getReference("Comments").push().getKey();
        DatabaseReference reference = FirebaseDatabase.getInstance().getReference("Comments").child(key);
        HashMap<String, Object> hashMap = new HashMap<>();
        hashMap.put("Eventid",eventid);
        hashMap.put("Fullname",name);
        hashMap.put("Cmsg",commt);
        hashMap.put("Commentdate",getCurrentdate());
        hashMap.put("images",imgurl);
        reference.setValue(hashMap).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                if (task.isSuccessful()){
                    progressBar.setVisibility(View.INVISIBLE);
                    Toast.makeText(AddComment.this, "Comment Added Successfully", Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(AddComment.this,EventsActivity.class);
                    intent.putExtra("eventid",getIntent().getStringExtra("commtid"));
                    startActivity(intent);
                }else{
                    Toast.makeText(AddComment.this, "Failed To Add Comment", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

   /* private void UpdateComments(final String evenid, final String imgurl) {
        mRequestQueue = Volley.newRequestQueue(this);
        //String Request initialized
        mStringRequest = new StringRequest(Request.Method.POST, updateurl, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                if(response.matches("successfully")){
                    Toast.makeText(AddComment.this, "Image Url Updated Successfully!", Toast.LENGTH_SHORT).show();
                }else{
                    Toast.makeText(AddComment.this, "Failed To Update Image Url", Toast.LENGTH_SHORT).show();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(AddComment.this, ""+error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("eventid",evenid);
                params.put("image",imgurl);
                return params;
            }

        };

        mRequestQueue.add(mStringRequest);
    }*/


   /* private void InsertComment(final String eventid, final String commt) {
        mRequestQueue = Volley.newRequestQueue(this);
        //String Request initialized
        mStringRequest = new StringRequest(Request.Method.POST, urls, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                if(response.matches("successfully")){
                    Toast.makeText(AddComment.this, "Comment Added Successfully", Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(AddComment.this,EventsActivity.class);
                    intent.putExtra("eventid",getIntent().getStringExtra("commtid"));
                    startActivity(intent);
                }else{
                    Toast.makeText(AddComment.this, "Failed To Add Comment", Toast.LENGTH_SHORT).show();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(AddComment.this, ""+error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("username",name);
                params.put("image",imgurl);
                params.put("eventid",eventid);
                params.put("commt",commt);
                return params;
            }

        };

        mRequestQueue.add(mStringRequest);
    }*/


    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
            case android.R.id.home:
                Intent intent = new Intent(AddComment.this,EventsActivity.class);
                intent.putExtra("eventid",getIntent().getStringExtra("commtid"));
                startActivity(intent);
        }
        return super.onOptionsItemSelected(item);
    }
}
